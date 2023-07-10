<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Helper
{
    public static function date_format($date)
    {
        return date('F j, Y', strtotime($date));
    }
    public static function time_format($time)
    {
        return date('h:i A', strtotime($time));
    }
    public static function date_time_format($date_time)
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date_time);
        $currentDate = Carbon::now()->startOfDay();
        if ($date->isSameDay($currentDate)) {
            $formatted_date_time = 'Today ' . $date->format('h:iA');
        } elseif ($date->isSameDay($currentDate->subDay())) {
            $formatted_date_time = 'Yesterday ' . $date->format('h:iA');
        } elseif ($date->isSameDay($currentDate->addDays(2))) {
            $formatted_date_time = 'Tomorrow ' . $date->format('h:iA');
        } else {
            $formatted_date_time = $date->format('F j, Y h:iA');
        }
        return $formatted_date_time;
    }
    public static function currency_format($price)
    {
        return '$' . number_format($price, 2);
    }
    public static function image_path($image)
    {
        if (Str::contains($image, 'logo')) {
            $path = url('storage/app/public/assets/admin/images/theme/logo.svg');
        } elseif (Str::contains($image, 'default') || Str::contains($image, 'user')) {
            $path = url('storage/app/public/assets/admin/images/users/' . $image);
        } elseif (Str::contains($image, 'document') ) {
            $path = url('storage/app/public/assets/admin/images/documents/' . $image);
        } else {
            $path = 'https://placehold.co/400';
        }
        return $path;
    }
    public static function resetpassword($email, $url)
    {
        $data = ['title' => 'Reset Password', 'email' => $email, 'url' => $url, 'logo' => Helper::image_path('logo.svg')];
        try {
            Mail::send('email.reset_password', $data, function ($message) use ($data) {
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public static function countries_list()
    {
        $countries = ['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo (Brazzaville)', 'Congo (Kinshasa)', 'Costa Rica', 'Cote d`Ivoire', 'Croatia', 'Cuba', 'Cyprus', 'Czechia', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Holy See', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Korea, South', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Korea', 'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestine State', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States of America', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe',];
        return $countries;
    }

    public static function timezones_list()
    {
        $timezones = [
            "(UTC-12:00) International Date Line West",
            "(UTC-11:00) Coordinated Universal Time-11",
            "(UTC-10:00) Aleutian Islands",
            "(UTC-10:00) Hawaii",
            "(UTC-09:30) Marquesas Islands",
            "(UTC-09:00) Coordinated Universal Time-09",
            "(UTC-09:00) Alaska",
            "(UTC-08:00) Coordinated Universal Time-08",
            "(UTC-08:00) Pacific Time (US & Canada)",
            "(UTC-07:00) Arizona",
            "(UTC-07:00) Mountain Time (US & Canada)",
            "(UTC-06:00) Central Time (US & Canada)",
            "(UTC-05:00) Eastern Time (US & Canada)",
            "(UTC-04:30) Caracas, La Paz",
            "(UTC-04:00) Atlantic Time (Canada)",
            "(UTC-03:30) Newfoundland",
            "(UTC-03:00) Brasilia, Buenos Aires",
            "(UTC-03:00) Greenland",
            "(UTC-02:00) Mid-Atlantic",
            "(UTC-01:00) Cape Verde Islands",
            "(UTC-01:00) Azores",
            "(UTC±00:00) Casablanca, Monrovia, Reykjavik",
            "(UTC±00:00) Dublin, Edinburgh, Lisbon, London",
            "(UTC+01:00) Amsterdam, Berlin, Rome, Paris",
            "(UTC+02:00) Athens, Bucharest, Istanbul",
            "(UTC+02:00) Jerusalem",
            "(UTC+03:00) Moscow, St. Petersburg, Volgograd",
            "(UTC+04:00) Abu Dhabi, Muscat",
            "(UTC+04:30) Tehran",
            "(UTC+04:00) Tbilisi, Yerevan",
            "(UTC+04:30) Kabul",
            "(UTC+05:00) Islamabad, Karachi",
            "(UTC+05:00) Ekaterinburg",
            "(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi",
            "(UTC+05:45) Kathmandu",
            "(UTC+06:00) Astana, Dhaka",
            "(UTC+06:30) Yangon (Rangoon)",
            "(UTC+07:00) Bangkok, Hanoi, Jakarta",
            "(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi",
            "(UTC+08:00) Kuala Lumpur, Singapore",
            "(UTC+08:00) Taipei",
            "(UTC+09:00) Osaka, Sapporo, Tokyo",
            "(UTC+09:00) Seoul",
            "(UTC+09:00) Yakutsk",
            "(UTC+09:30) Adelaide",
            "(UTC+09:30) Darwin",
            "(UTC+10:00) Brisbane",
            "(UTC+10:00) Canberra, Melbourne, Sydney",
            "(UTC+10:00) Guam, Port Moresby",
            "(UTC+10:00) Hobart",
            "(UTC+11:00) Vladivostok",
            "(UTC+12:00) Magadan, Solomon Islands, New Caledonia",
            "(UTC+12:00) Auckland, Wellington",
            "(UTC+13:00) Fiji, Kamchatka, Marshall Islands",
            "(UTC+13:00) Tonga"
        ];
        return $timezones;
    }
}
