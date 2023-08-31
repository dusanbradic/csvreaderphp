<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use Illuminate\Support\Facades\File;
use SplFileObject;

class ImportItems extends Command
{
    protected $signature = 'import:items';

    protected $description = 'Import items from a CSV file and skip duplicate items';

    private $csvPath = 'storage/csv_files/items.csv';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if (File::exists($this->csvPath)) {
            $csv = new SplFileObject($this->csvPath);
            $csv->setFlags(SplFileObject::READ_CSV);

            // Skip the header row

            foreach ($csv as $row) {
                $name = $row[0];
                $price = $row[1];
                $url = $row[2];

                // Check for duplicate item by name
                $existingItem = Item::where('name', $name)
                    ->where('price', $price)
                    ->where('url', $url)
                    ->first();

                if ($existingItem) {
                    $this->warn("Duplicate item found: $name $price $url (Skipping)");
                    continue;
                }

                Item::create([
                    'name' => $name,
                    'price' => $price,
                    'url' => $url,
                ]);

                $this->info("Item added: $name");
            }

            $this->info("Import completed.");
        } else {
            $this->error("CSV file not found.");
        }
    }
}