<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventsData = [
            [
                'title' => 'Tunisian Eco Summit 2023',
                'description' => 'Join the national eco summit for environmental conservation in Tunisia.',
                'objective' => 'Discuss sustainability, conservation efforts, and eco-friendly solutions.',
                'category' => 'Ecology',
                'start_date' => '2023-11-15 09:00:00',
                'end_date' => '2023-11-17 17:00:00',
                'image_path' => 'tunisian_eco_summit.jpg',
                'max_participants' => 500,
                'participants_count' => 0,
            ],
            [
                'title' => 'Tunisian Green Expo',
                'description' => 'Explore eco-friendly products and sustainable living in Tunisia.',
                'objective' => 'Promote green initiatives and eco-conscious choices in Tunisia.',
                'category' => 'Ecology',
                'start_date' => '2023-10-20 10:00:00',
                'end_date' => '2023-10-22 18:00:00',
                'image_path' => 'tunisian_green_expo.jpg',
                'max_participants' => 300,
                'participants_count' => 0,
            ],
            [
                'title' => 'Eco Adventure in the Tunisian Desert',
                'description' => 'Embark on a thrilling eco-adventure in the Tunisian desert.',
                'objective' => 'Experience the unique desert ecology and culture of Tunisia.',
                'category' => 'Ecology',
                'start_date' => '2023-09-10 14:00:00',
                'end_date' => '2023-09-12 20:00:00',
                'image_path' => 'tunisian_eco_adventure.jpg',
                'max_participants' => 50,
                'participants_count' => 0,
            ],
            [
                'title' => 'Tunisian Green Symposium',
                'description' => 'Join experts for discussions on green living and sustainability in Tunisia.',
                'objective' => 'Promote green initiatives and eco-conscious choices in Tunisia.',
                'category' => 'Ecology',
                'start_date' => '2023-12-05 08:30:00',
                'end_date' => '2023-12-05 17:00:00',
                'image_path' => 'tunisian_green_symposium.jpg',
                'max_participants' => 150,
                'participants_count' => 0,
            ],
            [
                'title' => 'Eco Tourism in Tunisia',
                'description' => 'Experience eco-tourism in the beautiful landscapes of Tunisia.',
                'objective' => 'Explore the unique ecology and culture of Tunisia.',
                'category' => 'Ecology',
                'start_date' => '2023-07-28 17:00:00',
                'end_date' => '2023-07-30 23:59:00',
                'image_path' => 'tunisian_eco_tourism.jpg',
                'max_participants' => 100,
                'participants_count' => 0,
            ],
            [
                'title' => 'Sustainable Agriculture Workshop in Tunisia',
                'description' => 'Learn about sustainable farming practices in Tunisia.',
                'objective' => 'Promote environmentally friendly agriculture methods in Tunisia.',
                'category' => 'Ecology',
                'start_date' => '2023-06-15 12:00:00',
                'end_date' => '2023-06-17 20:00:00',
                'image_path' => 'tunisian_sustainable_agriculture.jpg',
                'max_participants' => 200,
                'participants_count' => 0,
            ],
            [
                'title' => 'Tunisian Eco Film Festival',
                'description' => 'Celebrate environmental films from around the world in Tunisia.',
                'objective' => 'Raise awareness about environmental issues through film in Tunisia.',
                'category' => 'Ecology',
                'start_date' => '2023-08-25 09:00:00',
                'end_date' => '2023-08-27 17:00:00',
                'image_path' => 'tunisian_eco_film_festival.jpg',
                'max_participants' => 250,
                'participants_count' => 0,
            ],
            [
                'title' => 'Tunisian Eco Adventure Hike',
                'description' => 'Hike through the scenic natural beauty of Tunisia.',
                'objective' => 'Explore the unique ecology of Tunisia while hiking.',
                'category' => 'Ecology',
                'start_date' => '2023-09-30 18:30:00',
                'end_date' => '2023-09-30 21:00:00',
                'image_path' => 'tunisian_eco_hike.jpg',
                'max_participants' => 150,
                'participants_count' => 0,
            ],
        ];

        foreach ($eventsData as $eventData) {
            Event::create($eventData);
        }
}
}
