<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::insert([
            [
                'title' => 'Kareem Hunt returns to team drills,',
                'content' => 'When it came time for the first set of 11-on-11s, Hunt took the second snap behind Chubb, and then went back in for the fourth and caught a screen pass from Deshaun Watson.
    
                <br/>He also got the first three reps with the starters in their first two-minute drill of training camp, almost as if Chubb symbolically gave way to his buddy at the start of the drill.
                
                <br/>Hunt was fined by the club for sitting out team periods on Friday and Saturday, and Kevin Stefanski made it clear that such conduct was against team rules.
                
                <br/><br/>“If our players are healthy, they practice,’’ he said.
                
                <br/>After practice, Hunt ran sprints in the sweltering heat — a ‘feels-like’ temp of 98 — alongside Josh Rosen and Jacoby Brissett.
                
                <br/>It remains to be seen where this is headed, but Hunt was all in on Sunday.',
                'slug' => 'kareem-hunt',
                'url' => 'sport_1.JPG',
                'category_id' => 1,
                'status' => 1,
                'created_by' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'title' => 'Kevin Harvick wins FireKeepers Casino 400 at Michigan',
                'content' => '"Everyone who doubted us, doesn’t know us. They obviously know we thrive in these types of situations. A lot of things went our way today, which we hadn’t had all year long," Harvick said, adding the biggest thing for him was to take advantage of the pits and restarts.

                <br/><br/>Christopher Bell picked up a victory in Stage 1 but later had to pit after brief contact with the wall. Hamlin finished second in Stage 1 but won Stage 2. But in the end, it was Harvick coming out on top.',
                'slug' => 'kevin-harvick',
                'url' => 'sport_2.jpg',
                'category_id' => 1,
                'status' => 1,
                'created_by' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'title' => 'What Coffee Does to Your Blood Pressure',
                'content' => 'Coffee is surprisingly beneficial for your health in more ways than one. It contains polyphenols (powerful antioxidants that ward off disease in the body), can improve your gut health, and even helps you live longer. However, while a cup of morning java can positively improve your overall health, there are a few caveats to consider—like what coffee does to your blood pressure.

                <br/><br/>Now its important to note that coffee isnt the only thing to be concerned about, but consuming caffeine in general. According to the Mayo Clinic, consuming caffeine can cause a short yet dramatic increase in blood pressure. Although the connecting reason between the two is still unclear, some researchers think caffeine can block a hormone that keeps the arteries widened, resulting in higher numbers.',
                'slug' => 'what-coffee',
                'url' => 'health_1.jpeg',
                'category_id' => 2,
                'status' => 1,
                'created_by' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'title' => 'Heres how Utahs universities are gearing up to fight monkeypox as classes resume',
                'content' => 'SALT LAKE CITY — The federal government on Thursday declared a public health emergency in the face of the monkeypox outbreak that has now infected more than 7,000 Americans.

                <br/><br/>Universities around the state will be kicking off the fall semester later this month, marking a return to the Beehive State for students all across the world.
                
                <br/>With an influx of people coming to the state — some living in dorms or close-quarter situations — heres how Utahs higher education institutions are preparing for students return and how theyre equipping themselves to handle a monkeypox outbreak.',
                'slug' => 'heres-how-utahs-universities',
                'url' => 'health_2.jpeg',
                'category_id' => 2,
                'status' => 1,
                'created_by' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'title' => 'iPhone 14 event: Apple begins production of virtual keynote for September',
                'content' => '
                According to the latest edition of Mark Gurman’s Power On newsletter, Apple has started to “record and assemble its September media event.” The event, based on history, is likely to take place during the first half of September.
                
                <br/>Notably, this seems to mean that Apple is planning a virtual or hybrid event for the iPhone 14 launch this year rather than a fully in-person event like what was done prior to the pandemic. It seems likely that Apple will take a similar approach with the iPhone 14 launch as it took with WWDC in June.
                
                <br/><br/>This would mean a fully prerecorded keynote video, with some members of the press in attendance at Apple Park for hands-on opportunities and briefings. The in-person portion of the event would be significantly smaller than WWDC because Apple would only invite members of the press, not developers.',
                'slug' => 'iPhone-14-event',
                'url' => 'technology_2.jpg',
                'category_id' => 3,
                'status' => 1,
                'created_by' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'title' => 'LGs latest earbuds include head-tracking spatial audio',
                'content' => 'LG is today announcing two new sets of wireless earbuds. First up are the Tone Free T90 buds, which now become the company’s flagship pair. They still have the signature bacteria-killing UVnano charging case. And like the previous Tone Free FP9, the case can also double as a Bluetooth transmitter, letting you run an aux cable to devices that might lack wireless connectivity — like a treadmill — and still use the earbuds like normal.

                <br/><br/>According to LGs press release, the noise-canceling T90s have “a new internal structure with larger drivers that helps generate deeper, more satisfying bass.” But what’s more interesting is that they support Dolby Head Tracking “across your favorite content and devices.” Here’s how LG describes that experience:',
                'slug' => 'LGs-latest',
                'url' => 'technology_1.jpg',
                'category_id' => 3,
                'status' => 1,
                'created_by' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'title' => 'China mulls using lunar satellites to probe the cosmic dark ages',
                'content' => 'Chinese scientists want to use the moon to help get an unprecedented look at the early, dark days of our universe.

                <br/>The team behind the Discovering the Sky at the Longest Wavelengths (DSL) mission, also known as Hongmeng, want to send 10 satellites into orbit around the moon to pick up faint cosmic signals, using our celestial neighbor to block electromagnetic interference from human activity on Earth. 
                
                <br/><br/>The aim is to gain a glimpse at the so-called cosmic dark ages—a mysterious era before the first stars began to shine—by collecting faint, stretched out, ultra-long wavelength light emitted by hydrogen atoms formed by the Big Bang.',
                'slug' => 'China-mulls',
                'url' => 'science_1.jpg',
                'category_id' => 4,
                'status' => 1,
                'created_by' => 1,
                'created_at' => date('Y/m/d'),
            ],
            [
                'title' => '“Time Expansion” Our Perception of Time Has Slowed',
                'content' => 'The majority of research participants (65%) reported feeling that time was moving more slowly at the conclusion of the first month of social isolation, which occurred in May 2020. This perception was termed by the researchers as “time expansion,” and they discovered that it was linked to feelings of isolation and a lack of enjoyable activities throughout the time period.

                <br/>Even more people (75%) said they didnt experience as much “time pressure,” which is the sensation that time is passing more quickly and leaving less time for activities of daily living and recreation. 90% of those surveyed claimed they were taking shelter at home during that time.',
                'slug' => '“Time-Expansion”',
                'url' => 'science_2.jpg',
                'category_id' => 4,
                'status' => 1,
                'created_by' => 1,
                'created_at' => date('Y/m/d'),
            ],
        ]);
    }
}
