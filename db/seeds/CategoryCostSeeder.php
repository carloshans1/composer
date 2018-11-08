<?php

use Phinx\Seed\AbstractSeed;

class CategoryCostSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $categoryCosts = $this->table('categoriaCusto');
        $data = [];
        foreach (range(1,10) as $value){
            $data[] =
                [
                    'nome' => $faker->name,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
        }
        $categoryCosts->insert($data)->save();

        /**
        $categoryCosts->insert([
            [
                'nome' => 'Category 1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Category 2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ])->save();
        */
    }
}
