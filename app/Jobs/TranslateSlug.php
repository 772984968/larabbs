<?php

namespace App\Jobs;

use App\Models\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Handlers\SlugTranslateHandler;

class TranslateSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $topic;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Topic $topic)
    {
        $this->topic=$topic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        die('s');
        $slug = app(SlugTranslateHandler::class)->translate($this->topic->title);
        \DB::table('topics')->where('id', $this->topic->id)->update(['slug' => $slug]);
    }
}
