<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category; 
use GuzzleHttp\Client;

class ImportProducts extends Command
{
    protected $signature = 'products:import';
    protected $description = 'Importar produtos da API externa';

    public function handle()
    {
        $client = new Client();

        // URL da API
        $url = 'https://fakestoreapi.com/products';

        try {
            $response = $client->get($url, ['verify' => false]);

            $productsData = json_decode($response->getBody()->getContents(), true);

            foreach ($productsData as $productData) {
                $category = Category::firstOrCreate(
                    ['name' => $productData['category']]
                );

                $product = Product::where('name', $productData['title'])->first();

                if ($product) {
                    $product->update([
                        'price' => $productData['price'],
                        'description' => $productData['description'],
                        'category_id' => $category->id,
                        'image_url' => $productData['image']
                    ]);
                    $this->info("Produto atualizado com sucesso: {$product->name}");
                } else {
                    $product = Product::create([
                        'name' => $productData['title'],
                        'price' => $productData['price'],
                        'description' => $productData['description'],
                        'category_id' => $category->id, 
                        'image_url' => $productData['image']
                    ]);
                    $this->info("Produto importado com sucesso: {$product->name}");
                }
            }

        } catch (\Exception $e) {
            $this->error('Erro ao importar produtos: ' . $e->getMessage());
        }
    }
}
