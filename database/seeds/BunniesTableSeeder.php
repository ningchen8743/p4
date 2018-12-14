<?php

use Illuminate\Database\Seeder;
use App\Bunny;

class BunniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bunnies = [
            ['Sherman', 'buck', '2017-07-14', 'Lionhead','adoptable','https://rabbit.org/articles/wp-content/uploads/2018/08/Shooie-1-225x300.jpg'],
            ['Trueman', 'doe', '2018-04-13', 'Netherland Dwarf', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2018/03/Sable-300x225.jpeg'],
            ['Sunny', 'doe', '2016-01-23', 'Rex', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2018/11/Sunny-checking-emails-300x161.jpg'],
            ['Sherry', 'buck', '2018-10-01', 'Netherland Dwarf', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2018/11/Yoda-225x300.jpeg'],
            ['Chester', 'doe', '2016-11-27', 'Lop', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2018/09/Chester-205x300.jpg'],
            ['Amy', 'doe', '2017-1-15', 'Lop', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2018/03/Anabella-2-e1522118255571-225x300.jpeg'],
            ['Hector', 'buck', '2018-4-23', 'Rex', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2018/01/Hector-Gene-225x300.jpg'],
            ['Benny', 'buck', '2018-09-05', 'Netherland Dwarf', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2017/06/Benny-3-Copy-e1497151114579.jpg'],
            ['Meatloaf', 'doe', '2015-08-21', 'Lionhead', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2017/05/Meatloaf-e1493089774305-300x300.jpg'],
            ['Matty', 'doe', '2015-11-21', 'Rex', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2017/03/Matilda-e1489980956778-225x300.jpg'],
            ['Dane', 'doe', '2018-10-04', 'Lionhead', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2017/03/Dane-4-300x300.jpg'],
            ['Kikko', 'buck', '2018-10-04', 'Lionhead', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2016/10/kiko2-e1475463943748.jpg'],
            ['Nick', 'buck', '2016-09-16', 'Rex', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2016/12/Nick-Fury-2-300x300.jpg'],
            ['Snuffles', 'buck', '2017-03-09', 'Lionhead', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2016/03/Snuffles-300x266.jpg'],
            ['Kyle', 'buck', '2014-02-23', 'Rex', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2015/02/Kyle.jpg'],
            ['Rooney', 'buck', '2013-05-20', 'Lionhead', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2014/10/Rooney.jpg'],
            ['Bailey', 'doe', '2018-07-13', 'Rex', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2014/10/Bailey.jpg'],
            ['Ellie', 'buck', '2016-08-08', 'Lionhead', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2016/02/Ellie-2-300x224.jpg'],
            ['Max', 'buck', '2015-10-01', 'Lionhead', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2014/10/Max-2.jpg'],
            ['Guimauve', 'buck', '2016-02-07', 'Lionhead', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2014/08/Guimauve-300x287.jpg'],
            ['Jake', 'buck', '2017-03-06', 'Lop', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2018/11/Lili.jpeg'],
            ['Sunday', 'buck', '2018-01-18', 'Lop', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2017/09/Sunny-Bunny-247x300.png'],
            ['Reese', 'doe', '2016-05-13', 'Netherland Dwarf', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2017/02/Reese.jpg'],
            ['Velvet', 'doe', '2018-01-03', 'Netherland Dwarf', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2016/07/velvet-224x300.jpg'],
            ['Bernie', 'buck', '2018-03-02', 'Lop', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2015/04/Bernie.jpg'],
            ['Brosnan', 'buck', '2016-08-10', 'Netherland Dwarf', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2015/04/Brosnan2.jpg'],
            ['Bun', 'buck', '2017-06-12', 'Lop', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2015/03/Bun-Buns-300x225.jpg'],
            ['Lilac', 'doe', '2017-04-03', 'Netherland Dwarf', 'adoptable','https://rabbit.org/articles/wp-content/uploads/2015/02/Lilac-300x240.jpg'],
        ];

        $count = count($bunnies);

        foreach ($bunnies as $key => $bunnyData) {
            $bunny = new Bunny();

            $bunny->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $bunny->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $bunny->name = $bunnyData[0];
            $bunny->sex = $bunnyData[1];
            $bunny->dob = $bunnyData[2];
            $bunny->breed = $bunnyData[3];
			$bunny->adoption_status = $bunnyData[4];
            $bunny->photo_url = $bunnyData[5];

            $bunny->save();
            $count--;
        }
    }
}
