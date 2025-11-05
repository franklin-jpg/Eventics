<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventCategory;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 categories first
        $categories = EventCategory::factory(20)->create();

        // For each category, create some events
        $categories->each(function ($category) {
            Event::factory(5)->create([
                'event_category_id' => $category->id,
            ]);
        });
    }
}
