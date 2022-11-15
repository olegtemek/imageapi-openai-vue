<?php

namespace App\Console\Commands;

use App\Models\Image;
use App\Models\Word;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageGet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to get image';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $words = Word::all();
        $array_words = [];

        foreach ($words as $word) {
            array_push($array_words, $word->word);
        }

        $array_words_keys = array_rand($array_words, 3);

        $prompt = $array_words[$array_words_keys[0]] . ' ' . $array_words[$array_words_keys[1]] .  ' ' . $array_words[$array_words_keys[2]];

        $apiURL = 'https://api.openai.com/v1/images/generations';
        $postInput = [
            "prompt" => $prompt,
            "n" => 1,
            "size" => "512x512",
            'response_format' => 'b64_json'
        ];

        $response = Http::acceptJson()
            ->withHeaders([
                'Content-Type' => 'application/json'
            ])
            ->withToken(env('OPEN_TOKEN'))
            ->post($apiURL, $postInput)
            ->json();

        $image_url = $response['data'][0]['b64_json'];
        if (!empty($image_url)) {
            $image = str_replace('data:image/png;base64,', '', $image_url);
            $image = str_replace(' ', '+', $image);
            $image_name = time() . '_' . '.png';

            Storage::disk('public')->put($image_name, base64_decode($image));

            Image::create([
                'title' => $prompt,
                'url' => $image_name,
                'day' => date('d-m-Y')
            ]);
        }
        return Command::SUCCESS;
    }
}
