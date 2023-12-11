<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RecycleStation;
class RecycleStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDateTime = Carbon::now();
        $stations = [
  
                // Station 1
                [
                    'name' => 'Tunis Recycling Center 1',
                    'address' => '123 Main Street, Tunis',
                    'latitude' => 36.806496,
                    'longitude' => 10.181532,
                    'description' => 'A recycling center in Tunis, Tunisia.',
                    'contact_email' => 'station1@example.com',
                    'contact_phone' => '+1234567890',
                    'website' => 'https://www.example.com/station1',
                    'operating_hours' => 'Mon-Fri: 8 AM - 6 PM, Sat: 9 AM - 2 PM',
                    'accepted_materials' => 'Plastic, Paper, Glass',
                    'services' => 'Sorting, Pickup',
                    'accessibility' => 'Wheelchair Accessible',
                    'rating' => 4.5,
                    'image_path' => 'station1.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 2
                [
                    'name' => 'Green Earth Recycling Station',
                    'address' => '456 Recycling Road, Tunis',
                    'latitude' => 36.813095,
                    'longitude' => 10.174682,
                    'description' => 'A station dedicated to eco-friendly recycling efforts.',
                    'contact_email' => 'station2@example.com',
                    'contact_phone' => '+2345678901',
                    'website' => 'https://www.example.com/station2',
                    'operating_hours' => 'Mon-Sun: 9 AM - 7 PM',
                    'accepted_materials' => 'Plastic, Aluminum, Paper',
                    'services' => 'Sorting, Drop-off',
                    'accessibility' => 'Parking Available',
                    'rating' => 4.2,
                    'image_path' => 'station2.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 3
                [
                    'name' => 'Eco-Save Recycling Hub',
                    'address' => '789 Green Street, Tunis',
                    'latitude' => 36.805625,
                    'longitude' => 10.185785,
                    'description' => 'Promoting eco-friendly practices through recycling.',
                    'contact_email' => 'station3@example.com',
                    'contact_phone' => '+3456789012',
                    'website' => 'https://www.example.com/station3',
                    'operating_hours' => 'Tue-Sat: 10 AM - 5 PM',
                    'accepted_materials' => 'Glass, Paper, Cardboard',
                    'services' => 'Sorting, Education Programs',
                    'accessibility' => 'Public Transit Access',
                    'rating' => 4.0,
                    'image_path' => 'station3.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 4
                [
                    'name' => 'GreenCycle Collection Point',
                    'address' => '101 Recycle Avenue, Tunis',
                    'latitude' => 36.813983,
                    'longitude' => 10.176243,
                    'description' => 'Your destination for responsible recycling.',
                    'contact_email' => 'station4@example.com',
                    'contact_phone' => '+4567890123',
                    'website' => 'https://www.example.com/station4',
                    'operating_hours' => 'Mon-Fri: 7 AM - 5 PM, Sat: 8 AM - 3 PM',
                    'accepted_materials' => 'Plastic, Metal, Electronics',
                    'services' => 'Drop-off, E-waste Recycling',
                    'accessibility' => 'ADA Compliant',
                    'rating' => 4.3,
                    'image_path' => 'station4.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 5
                [
                    'name' => 'Tunis GreenTech Recycling',
                    'address' => '200 Eco Way, Tunis',
                    'latitude' => 36.808293,
                    'longitude' => 10.177751,
                    'description' => 'Innovative recycling solutions for a greener future.',
                    'contact_email' => 'station5@example.com',
                    'contact_phone' => '+5678901234',
                    'website' => 'https://www.example.com/station5',
                    'operating_hours' => 'Mon-Sun: 9 AM - 7 PM',
                    'accepted_materials' => 'Paper, Plastic, Electronics',
                    'services' => 'E-waste Recycling, Pickup',
                    'accessibility' => 'Wheelchair Accessible',
                    'rating' => 4.4,
                    'image_path' => 'station5.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 6
                [
                    'name' => 'EcoSavers Recycling Center',
                    'address' => '37 Green Avenue, Tunis',
                    'latitude' => 36.810674,
                    'longitude' => 10.182286,
                    'description' => 'Where recycling meets sustainability.',
                    'contact_email' => 'station6@example.com',
                    'contact_phone' => '+6789012345',
                    'website' => 'https://www.example.com/station6',
                    'operating_hours' => 'Mon-Fri: 8 AM - 6 PM, Sat: 9 AM - 2 PM',
                    'accepted_materials' => 'Glass, Plastic, Metal',
                    'services' => 'Sorting, Drop-off',
                    'accessibility' => 'Parking Available',
                    'rating' => 4.1,
                    'image_path' => 'station6.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 7
                [
                    'name' => 'Tunis EcoHub Recycling',
                    'address' => '555 Recycling Lane, Tunis',
                    'latitude' => 36.812145,
                    'longitude' => 10.186348,
                    'description' => 'Your destination for responsible recycling.',
                    'contact_email' => 'station7@example.com',
                    'contact_phone' => '+7890123456',
                    'website' => 'https://www.example.com/station7',
                    'operating_hours' => 'Mon-Sun: 9 AM - 7 PM',
                    'accepted_materials' => 'Paper, Plastic, Aluminum',
                    'services' => 'Drop-off, Pickup',
                    'accessibility' => 'Public Transit Access',
                    'rating' => 4.2,
                    'image_path' => 'station7.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 8
                [
                    'name' => 'GreenTech Recyclers',
                    'address' => '889 Environment Avenue, Tunis',
                    'latitude' => 36.808786,
                    'longitude' => 10.183579,
                    'description' => 'Recycling solutions for a better planet.',
                    'contact_email' => 'station8@example.com',
                    'contact_phone' => '+8901234567',
                    'website' => 'https://www.example.com/station8',
                    'operating_hours' => 'Mon-Fri: 7 AM - 5 PM, Sat: 8 AM - 3 PM',
                    'accepted_materials' => 'Plastic, Glass, Electronics',
                    'services' => 'E-waste Recycling, Sorting',
                    'accessibility' => 'ADA Compliant',
                    'rating' => 4.3,
                    'image_path' => 'station8.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 9
                [
                    'name' => 'EcoSolutions Recycling Hub',
                    'address' => '321 Green Road, Tunis',
                    'latitude' => 36.811203,
                    'longitude' => 10.175756,
                    'description' => 'A hub for sustainable recycling efforts.',
                    'contact_email' => 'station9@example.com',
                    'contact_phone' => '+9012345678',
                    'website' => 'https://www.example.com/station9',
                    'operating_hours' => 'Tue-Sat: 10 AM - 5 PM',
                    'accepted_materials' => 'Metal, Cardboard, Plastic',
                    'services' => 'Drop-off, Education Programs',
                    'accessibility' => 'Parking Available',
                    'rating' => 4.0,
                    'image_path' => 'station9.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
                // Station 10
                [
                    'name' => 'EcoHub Recycling Center',
                    'address' => '777 Green Street, Tunis',
                    'latitude' => 36.809468,
                    'longitude' => 10.180788,
                    'description' => 'A center dedicated to eco-friendly recycling.',
                    'contact_email' => 'station10@example.com',
                    'contact_phone' => '+0123456789',
                    'website' => 'https://www.example.com/station10',
                    'operating_hours' => 'Mon-Fri: 8 AM - 6 PM, Sat: 9 AM - 2 PM',
                    'accepted_materials' => 'Paper, Aluminum, Glass',
                    'services' => 'Sorting, Pickup',
                    'accessibility' => 'Public Transit Access',
                    'rating' => 4.1,
                    'image_path' => 'station10.jpg',
                    'date_added' => $currentDateTime,
                    'last_updated' => $currentDateTime,
                    'status' => 'active',
                ],
            
        ];

        foreach ($stations as $stationData) {
            RecycleStation::create($stationData);
        }
    }
}
