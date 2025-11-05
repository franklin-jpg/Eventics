<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        $title = ucfirst($this->faker->words(2, true)) . ' ' . Str::upper(Str::random(4));

        return [
            'event_category_id' => EventCategory::factory(), // creates a related category automatically
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(4),
            'event_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'location' => $this->faker->city(),
            'status' => $this->faker->randomElement(['draft', 'published']),
          'image' => $this->faker->imageUrl(640, 480, 'events', true, 'Event'),

        ];
    }
}
