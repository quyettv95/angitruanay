<?php
namespace App\Libs;

use Setting;
use Carbon\Carbon;

class Meal
{
    private $meals = [
        [
            'id' => 1,
            'name' => 'Bún cá',
            'image_url' => 'https://cdn.24h.com.vn/upload/2-2019/images/2019-04-03/Bun-ca-cay-mon-an-mang-huong-vi-rieng-cua-dat-Cang-1-1554281281-635-width640height427.jpg',
            'description' => 'Bún cá rô đồng là món bún nước với cá rô, có nguồn gốc từ tỉnh Hải Dương thuộc khu vực miền Bắc vùng đồng bằng sông Hồng. Món ăn này chỉ làm từ một loài cá rô sống trên ruộng đồng nhưng khi trải qua bàn tay của người dân quê thuộc tỉnh Hải Dương thì nó đã trở thành một món ăn độc đáo và gây nhiều ấn tượng đối với du khách. Bún cá rô luộc (hấp) được chế biến đơn giản nhưng lại giữ được vị ngọt đặc trưng của thịt cá.',
            'location' => '',
            'budget' => '30K - 50K / User',
            'score' => 30
        ],
        [
            'id' => 2,
            'name' => 'Bún bò || Cơm sườn',
            'image_url' => 'https://beptruong.edu.vn/wp-content/uploads/2018/06/cach-uop-thit-nuong-com-tam.jpg',
            'description' => 'Bún bò Huế là một trong những đặc sản của xứ Huế, mặc dù món bún này phổ biến trên cả ba miền ở Việt Nam và cả người Việt tại hải ngoại. Tại Huế, món này được gọi đơn giản là "bún bò" hoặc gọi cụ thể hơn là "bún bò giò heo". Các địa phương khác gọi là "bún bò Huế", "bún bò gốc Huế" để chỉ xuất xứ của món ăn này.',
            'location' => '',
            'budget' => '30K - 50K / User',
            'score' => 47
        ],
        [
            'id' => 3,
            'name' => 'Bún chả',
            'image_url' => 'https://cdn.tgdd.vn/Files/2018/07/18/1102275/huong-dan-cach-lam-bun-cha-ha-noi--7.jpg',
            'description' => 'Bún chả là món ăn với bún, chả thịt lợn nướng trên than hoa và bát nước mắm chua cay mặn ngọt. Món ăn xuất xứ từ miền Bắc Việt Nam, là thứ quà có sức sống lâu bền nhất của Hà Nội, nên có thể coi đây là một trong những đặc sản đặc trưng của ẩm thực Hà thành.',
            'location' => '',
            'budget' => '30K - 50K / User',
            'score' => 20
        ],
        [
            'id' => 4,
            'name' => 'Cơm 19A',
            'image_url' => 'http://streaming1.danviet.vn/upload/3-2017/images/2017-09-09/150493065457643-unnamed--2-.jpg',
            'description' => 'Cơm 19A, ăn 1 lần khiếp 1 tuần',
            'location' => '',
            'budget' => '30K - 50K / User',
            'score' => 0
        ],
        [
            'id' => 5,
            'name' => 'Bữa cải thiện',
            'image_url' => 'http://viewdao.net/wp-content/uploads/2018/11/45661534_2173952432865233_1173627915603017728_n.jpg',
            'description' => 'Để hâm nóng tình cảm  anh em và tăng tương tác, đôi khi chúng ta nên tổ chức vài buổi cải thiện có thể là lẩu, buffet, ...',
            'location' => '',
            'budget' => '100K - 200k / User',
            'score' => 3
        ],
    ];
    private static $instance = null;

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new Meal();
        }
        return self::$instance;
    }

    public function getRandom($ignoreIndex = null)
    {
        $availableMeals = $this->meals;
        $arrayForRandom = [];
        $total = 0;
        foreach ($availableMeals as $key => $meal) {
            if ($key != $ignoreIndex) {
                $arrayForRandom = array_merge($arrayForRandom, array_fill(0, $meal['score'], $key));
                $total += $meal['score'];
            }
        }
        shuffle($arrayForRandom);
        $randomIndex = rand(0, $total - 1);
        $todayMeal = $availableMeals[$arrayForRandom[$randomIndex]];
        return $arrayForRandom[$randomIndex];
    }

    public function getTodayMeal()
    {
        $todayMealIndex = Setting::get(Carbon::now()->format('d_m_Y'));
        if ($todayMealIndex != null) {
            return $this->meals[$todayMealIndex];
        }
        $yesterdayMealIndex = Setting::get(Carbon::yesterday()->format('d_m_Y'));
        $todayMealIndex = $this->getRandom($yesterdayMealIndex);
        Setting::set(Carbon::now()->format('d_m_Y'), $todayMealIndex);
        Setting::save();
        return $this->meals[$todayMealIndex];
    }

    public function getYesterdayMeal()
    {
        $yesterdayMealIndex = Setting::get(Carbon::yesterday()->format('dmY_meal_index'));
        if ($yesterdayMealIndex === null) {
            return null;
        }
        return $this->meals[$yesterdayMealIndex];
    }
}
