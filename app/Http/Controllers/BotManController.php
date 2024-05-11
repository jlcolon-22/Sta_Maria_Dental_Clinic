<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Messages\Outgoing\Question;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class BotManController extends Controller
{
    protected $firstname = 'ss';

    protected $email;
    // public function handle()
    // {
    //     $config = [
    //         'conversation_cache_time' => 40,

    //         'user_cache_time' => 30,
    //         'matchingData' => [
    //             'driver' => 'web',
    //         ],
    //     ];

    //     $botman = app("botman");
    //     $question = Question::create("Tell me, which type of product you are looking for?")
    //     ->fallback("Unable to help at this time, please try again later")
    //     ->callbackId("choose_query")
    //     ->addButtons([
    //         Button::create("Something electronic like a phone or TV")->value("Electronic"),
    //         Button::create("A trip to my favorite destination")->value("trip"),
    //         Button::create('Something else')->value('Something'),
    //     ]);

    //     $botman->hears("{message}", function (BotMan $bot, $message) {
    //         $question = Question::create("Tell me, which type of product you are looking for?")
    //             ->fallback("Unable to help at this time, please try again later")
    //             ->callbackId("choose_query")
    //             ->addButtons([
    //                 Button::create("Something electronic like a phone or TV")->value("Electronic"),
    //                 Button::create("A trip to my favorite destination")->value("trip"),
    //                 Button::create('Something else')->value('Something'),
    //             ]);
    //         $bot->ask($question, function (Answer $answer, $botman) {
    //             // Detect if button was clicked:
    //             if ($answer->isInteractiveMessageReply()) {
    //                 if ($answer->getValue() == 'Electronic') {
    //                     $question = Question::create("Choose 1 from electronic?")
    //                         ->fallback("Unable to ask question")
    //                         ->callbackId("I can not understand this")
    //                         ->addButtons([
    //                             Button::create('Phone')->value('Phone'),
    //                             Button::create('TV')->value('TV'),
    //                             Button::create('Something else')->value('something'),
    //                         ]);
    //                     $botman->ask($question, function (Answer $answer, $botman) {
    //                         if ($answer->isInteractiveMessageReply()) {
    //                             $type = $answer->getText();
    //                             $botman->reply('Ok, we are very good in finding the best deal for a' . $type . 'What brand is it that you are looking for');
    //                             $botman->ask('{brand}', function (Answer $answer, $brand, $botman) {
    //                                 $brand = $answer->getText();
    //                             });
    //                         }

    //                     });

    //                 } else if ($answer->getValue() == 'trip') {
    //                     $botman->say('Coming Soon');
    //                 } else if ($answer->getValue() == 'Something') {
    //                     $botman->say('Coming Soon');
    //                 }
    //             } else {
    //                 $botman->say('No category was selected');

    //             }
    //         });

    //     });

    //     $botman->listen();
    // }

    public function handle()
    {
        $botman = app('botman');
        $botman->fallback(function ($bot) {
            $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
        });
        $botman->hears('{message}', function ($bot, $message) {
            $keyword = strtolower($message);

            if (strpos($keyword, 'located') !== false || strpos($keyword, 'location') !== false) {
                $bot->reply('Answer: Our clinics are located in two (2) locations which are in 43 Camilo Osias Street, New Haven Village, Novaliches Q.C. for the Fairview Branch and 168 Gen. Luna Street, Malabon, Metro Manila for the Malabon Branch. You can also use Google maps to locate us. Our website is www.stamariadentalclinic.com');
            } elseif (strpos($keyword, 'make appointment') !== false) {
                $bot->reply('Answer: We welcome walk-in patients or simply fill out our appointment form or give us a call or text at 0917-8926273.');
            } elseif (strpos($keyword, 'dental services') !== false) {
                $bot->reply('Answer: Sta. Maria Dental Clinic is a full-service dental clinic, with a range of dental treatments on offer, including general dental for the whole family, cosmetic dentistry, and restorative dental procedures like implants and dentures. Have a look through our services section for a better understanding of everything we’re able to do for you.');
            } elseif (strpos($keyword, 'procedure') !== false) {
                $bot->reply('Answer: Call us at 0917-8926273. You’ll find our staff friendly and more than happy to take your questions.');
            } elseif (strpos($keyword, 'pain-free') !== false || strpos($keyword, 'dental practice') !== false) {
                $bot->reply('Answer: Yes. We provide a Profound Numbing Guarantee, an assurance that your treatment will be a pain-free and comfortable experience. If you do begin to feel pain, we’ll immediately pause the treatment to administer more anesthetic, and only continue when we’re confident that you’ll be comfortable.');
            } elseif (strpos($keyword, 'family') !== false && strpos($keyword, 'treatment') !== false) {
                $bot->reply('Answer: Our clinic is purpose-built to accommodate your entire family on the same day. We regularly treat patients of all ages and take the time to understand their unique dental and medical histories before providing treatment. Most of our patients consider us as their primary dentists to schedule routine dental appointments for their families and themselves.');
            } elseif (strpos($keyword, 'offer orthodontics') !== false || strpos($keyword, 'orthodontics') !== false) {
                $bot->reply('Answer: Yes! We offer reliable and cost-effective orthodontic treatment to bring crooked teeth and gradually move them into the ideal position.');
            } elseif (strpos($keyword, 'dental implants') !== false || strpos($keyword, 'implants') !== false) {
                $bot->reply('Answer: We are experts in dental implants, from single implants to full implant dentures, to restore normal function and appearance to your mouth.');
            } elseif (strpos($keyword, 'cosmetic dentistry') !== false || strpos($keyword, 'cosmetic') !== false) {
                $bot->reply('Answer: We offer a full array of cosmetic dental procedures, including teeth whitening, aligners, dental crowns, dental bonding, and even full mouth reconstructions to completely transform your smile.');
            } elseif (strpos($keyword, 'your credentials') !== false || strpos($keyword, 'credentials') !== false) {
                $bot->reply('Answer: Our doctors have obtained their D.M.D. degrees. In addition, they’ve completed advanced training in many areas of general and surgical dentistry. We’re affiliated with the Philippine Dental Association (PDA). As well as being the main choice for family dentistry by our patients in the Quezon City and Malabon areas.');
            } elseif (strpos($keyword, 'I’m scared of the dentist. Can you help me?') !== false || strpos($keyword, 'I’m scared') !== false) {
                $bot->reply('Answer: We are ready & eager to help you. Our experienced professionals (dentist & staff) provide patients with utmost care throughout their visit. Once your dental anxiety is taken care of, only then we shall proceed with treatment procedures.');
            } elseif (strpos($keyword, 'Is it every patient has the same fee and costs for the same treatment') !== false || strpos($keyword, 'fee') !== false) {
                $bot->reply('Answer: Not at all, every patient has a different situation or condition, some patients required more treatment procedures, and some required less.');
            } elseif (strpos($keyword, 'How long will it take to get an appointment') !== false || strpos($keyword, 'How long') !== false) {
                $bot->reply('Answer: We aim to be able to see you in our clinic within one (1) to two (2) days of your initial call. If you are in need of an emergency appointment, we will do our best to see you on the same day. If we are unable to treat your specific emergency, we work closely with specialists in the area and will get you to a provider who can help.');
            } elseif (strpos($keyword, 'Do you offer emergency appointments?') !== false || strpos($keyword, 'emergency appointments') !== false) {
                $bot->reply('Answer: Yes, if you call on a day, we are open, we will do everything we can to see you the same day.');
            } elseif (strpos($keyword, 'I need to cancel an appointment, what do I do?') !== false || strpos($keyword, 'cancel appointment') !== false) {
                $bot->reply('Answer: Please call us at the clinic as soon as possible to cancel and reschedule your appointment.  Please let us know no later than 24 hours prior to your appointment.  Your appointment is reserved for you and no one else–we respect your time, and request the same in return.');
            } elseif (strpos($keyword, 'Do I need to floss every day?') !== false || strpos($keyword, 'floss') !== false) {
                $bot->reply('Answer: Only floss the teeth you want to keep! Flossing requires more than just passing it through the space between your teeth.  Once you pass the floss between where your teeth contact, it’s important to then hug the floss around one of the teeth and advance it under the gumline.  Then hug the floss to the other tooth and advance it under the gumline.  It’s 3 steps! Floss contact, hug one tooth, then hug the other tooth.');
            } else {

                $question = Question::create("FAQs")
                    ->fallback("Unable to help at this time, please try again later")
                    ->callbackId("choose_query")
                    ->addButtons([
                        Button::create("Where are you located?")->value("Where are you located?"),
                        Button::create("How do I make an appointment at Sta. Maria Dental Clinic?")->value("How do I make an appointment at Sta. Maria Dental Clinic?"),
                        Button::create('What dental services do you provide?')->value('What dental services do you provide?'),
                        Button::create('What if I have questions about a procedure before I come in for a consultation?')->value('What if I have questions about a procedure before I come in for a consultation?'),
                        Button::create('Is this a pain-free dental practice?')->value('Is this a pain-free dental practice?'),
                        Button::create('Can my whole family come in for treatment on the same day?')->value('Can my whole family come in for treatment on the same day?'),
                        Button::create('Do you offer orthodontics?')->value('Do you offer orthodontics?'),
                        Button::create('Can you provide dental implants?')->value('Can you provide dental implants?'),
                        Button::create('Do you offer cosmetic dentistry?')->value('Do you offer cosmetic dentistry?'),
                        Button::create('How long will my first dental appointment last?')->value('How long will my first dental appointment last?'),
                        Button::create('What are your credentials?')->value('What are your credentials?'),
                        Button::create('I’m scared of the dentist. Can you help me?')->value('I’m scared of the dentist. Can you help me?'),
                        Button::create('Is it every patient has the same fee and costs for the same treatment?')->value('Is it every patient has the same fee and costs for the same treatment?'),
                        Button::create('How long will it take to get an appointment?')->value('How long will it take to get an appointment?'),
                        Button::create('Do you offer emergency appointments?')->value('Do you offer emergency appointments?'),
                        Button::create('I need to cancel an appointment, what do I do?')->value('I need to cancel an appointment, what do I do?'),
                        Button::create('What do I do if I missed my appointment?')->value('What do I do if I missed my appointment?'),
                        Button::create('Do I need to floss every day?')->value('Do I need to floss every day?'),
                        Button::create('Do I have to have the TV on during treatment?')->value('Do I have to have the TV on during treatment?'),
                    ]);
                $bot->ask($question, function (Answer $answer, $bot) {
                    // Detect if button was clicked:
                    if ($answer->isInteractiveMessageReply()) {
                        switch ($answer->getValue()) {
                            case 'Where are you located?':
                                $bot->say('Answer: Our clinics are located in two (2) locations which are in 43 Camilo Osias Street, New Haven Village, Novaliches Q.C. for the Fairview Branch and 168 Gen. Luna Street, Malabon, Metro Manila for the Malabon Branch. You can also use Google maps to locate us. Our website is www. stamariadentalclinic.com');
                                break;
                            case 'How do I make an appointment at Sta. Maria Dental Clinic?':
                                $bot->say('Answer: We welcome walk-in patients or simply fill out our appointment form or give us a call or text at 0917-8926273.');
                                break;
                            case 'What dental services do you provide?':
                                $bot->say('Answer: Sta. Maria Dental Clinic is a full-service dental clinic, with a range of dental treatments on offer, including general dental for the whole family, cosmetic dentistry, and restorative dental procedures like implants and dentures. Have a look through our services section for a better understanding of everything we’re able to do for you.');
                                break;
                            case 'What if I have questions about a procedure before I come in for a consultation?':
                                $bot->say('Answer: Call us at 0917-8926273. You’ll find our staff friendly and more than happy to take your questions.');
                                break;
                            case 'Is this a pain-free dental practice?':
                                $bot->say('Answer: Yes. We provide a Profound Numbing Guarantee, an assurance that your treatment will be a pain-free and comfortable experience. If you do begin to feel pain, we’ll immediately pause the treatment to administer more anesthetic, and only continue when we’re confident that you’ll be comfortable.');
                                break;
                            case 'Can my whole family come in for treatment on the same day?':
                                $bot->say('Answer: Our clinic is purpose-built to accommodate your entire family on the same day. We regularly treat patients of all ages and take the time to understand their unique dental and medical histories before providing treatment. Most of our patients consider us as their primary dentists to schedule routine dental appointments for their families and themselves.');
                                break;
                            case 'Do you offer orthodontics?':
                                $bot->say('Answer: Yes! We offer reliable and cost-effective orthodontic treatment to bring crooked teeth and gradually move them into the ideal position.');
                                break;
                            case 'Can you provide dental implants?':
                                $bot->say('Answer: We are experts in dental implants, from single implants to full implant dentures, to restore normal function and appearance to your mouth.');
                                break;
                            case 'Do you offer cosmetic dentistry?':
                                $bot->say('Answer: We offer a full array of cosmetic dental procedures, including teeth whitening, aligners, dental crowns, dental bonding, and even full mouth reconstructions to completely transform your smile.');
                                break;
                            case 'How long will my first dental appointment last?':
                                $bot->say('Answer: It varies but patients should plan on being with us for about an hour.');
                                break;
                            case 'What are your credentials?':
                                $bot->say('Answer: Our doctors have obtained their D.M.D. degrees. In addition, they’ve completed advanced training in many areas of general and surgical dentistry. We’re affiliated with the Philippine Dental Association (PDA). As well as being the main choice for family dentistry by our patients in the Quezon City and Malabon areas.');
                                break;
                            case 'I’m scared of the dentist. Can you help me?':
                                $bot->say('Answer: We are ready & eager to help you. Our experienced professionals (dentist & staff) provide patients with utmost care throughout their visit. Once your dental anxiety is taken care of, only then we shall proceed with treatment procedures.');
                                break;
                            case 'Is it every patient has the same fee and costs for the same treatment?':
                                $bot->say('Answer: Not at all, every patient has a different situation or condition, some patients required more treatment procedures, and some required less.');
                                break;
                            case 'How long will it take to get an appointment?':
                                $bot->say('Answer: We aim to be able to see you in our clinic within one (1) to two (2) days of your initial call. If you are in need of an emergency appointment, we will do our best to see you on the same day. If we are unable to treat your specific emergency, we work closely with specialists in the area and will get you to a provider who can help.');
                                break;
                            case 'Do you offer emergency appointments?':
                                $bot->say('Answer: Yes, if you call on a day, we are open, we will do everything we can to see you the same day.');
                                break;
                            case 'I need to cancel an appointment, what do I do?':
                                $bot->say('Answer: Please call us at the clinic as soon as possible to cancel and reschedule your appointment.  Please let us know no later than 24 hours prior to your appointment.  Your appointment is reserved for you and no one else–we respect your time, and request the same in return.');
                                break;
                            case 'What do I do if I missed my appointment?':
                                $bot->say('Answer: in the event of a missed appointment or cancellation within 24 hours of your scheduled time, please call us as soon as possible after your missed appointment to reschedule.');
                                break;
                            case 'Do I need to floss every day?':
                                $bot->say('Answer: Only floss the teeth you want to keep! Flossing requires more than just passing it through the space between your teeth.  Once you pass the floss between where your teeth contact, it’s important to then hug the floss around one of the teeth and advance it under the gumline.  Then hug the floss to the other tooth and advance it under the gumline.  It’s 3 steps! Floss contact, hug one tooth, then hug the other tooth.');
                                break;
                            case 'Do I have to have the TV on during treatment?':
                                $bot->say('Answer: “I don’t like distraction while in the dental chair, it just makes me more uneasy.” It is absolutely okay to feel this way, just please let us know and we will make sure to limit our patient comforts that are particularly distracting. We want you to be comfortable and are here to accommodate to your preferences.');
                                break;
                        }
                    } else {
                        $bot->say('No category was selected');
                    }
                });
                $bot->reply('Sorry, I didn\'t understand your question.');
            }
        });

        // $botman->hears('{message}', function ($botman, $message) {

        //     if ($message == 'hi') {
        //         $this->askName($botman);
        //     } else {
        //         $botman->reply("write 'hi' for testing...");
        //     }
        // });
        // $botman->hears("{message}", function (BotMan $bot, $message) {
        //             $question = Question::create("FAQs")
        //                 ->fallback("Unable to help at this time, please try again later")
        //                 ->callbackId("choose_query")
        //                 ->addButtons([
        //                     Button::create("Where are you located?")->value("Where are you located?"),
        //                     Button::create("How do I make an appointment at Sta. Maria Dental Clinic?")->value("How do I make an appointment at Sta. Maria Dental Clinic?"),
        //                     Button::create('What dental services do you provide?')->value('What dental services do you provide?'),
        //                     Button::create('What if I have questions about a procedure before I come in for a consultation?')->value('What if I have questions about a procedure before I come in for a consultation?'),
        //                     Button::create('Is this a pain-free dental practice?')->value('Is this a pain-free dental practice?'),
        //                     Button::create('Can my whole family come in for treatment on the same day?')->value('Can my whole family come in for treatment on the same day?'),
        //                     Button::create('Do you offer orthodontics?')->value('Do you offer orthodontics?'),
        //                     Button::create('Can you provide dental implants?')->value('Can you provide dental implants?'),
        //                     Button::create('Do you offer cosmetic dentistry?')->value('Do you offer cosmetic dentistry?'),
        //                     Button::create('How long will my first dental appointment last?')->value('How long will my first dental appointment last?'),
        //                     Button::create('What are your credentials?')->value('What are your credentials?'),
        //                     Button::create('I’m scared of the dentist. Can you help me?')->value('I’m scared of the dentist. Can you help me?'),
        //                     Button::create('Is it every patient has the same fee and costs for the same treatment?')->value('Is it every patient has the same fee and costs for the same treatment?'),
        //                     Button::create('How long will it take to get an appointment?')->value('How long will it take to get an appointment?'),
        //                     Button::create('Do you offer emergency appointments?')->value('Do you offer emergency appointments?'),
        //                     Button::create('I need to cancel an appointment, what do I do?')->value('I need to cancel an appointment, what do I do?'),
        //                     Button::create('What do I do if I missed my appointment?')->value('What do I do if I missed my appointment?'),
        //                     Button::create('Do I need to floss every day?')->value('Do I need to floss every day?'),
        //                     Button::create('Do I have to have the TV on during treatment?')->value('Do I have to have the TV on during treatment?'),
        //                 ]);
        //             $bot->ask($question, function (Answer $answer, $botman) {
        //                 // Detect if button was clicked:
        //                 if ($answer->isInteractiveMessageReply()) {
        //                     if ($answer->getValue() == 'Where are you located?') {
        //                         $botman->say('Answer:  Our clinics are located in two (2) locations which are in 43 Camilo Osias Street, New Haven Village, Novaliches Q.C. for the Fairview Branch and 168 Gen. Luna Street, Malabon, Metro Manila for the Malabon Branch. You can also use Google maps to locate us. Our website is www.stamariadentalclinic.com');
        //                     } else if ($answer->getValue() == 'How do I make an appointment at Sta. Maria Dental Clinic?') {
        //                         $botman->say('Answer: We welcome walk-in patients or simply fill out our appointment form or give us a call or text at 0917-8926273.');
        //                     } else if ($answer->getValue() == 'What dental services do you provide?') {
        //                         $botman->say('Answer: Sta. Maria Dental Clinic is a full-service dental clinic, with a range of dental treatments on offer, including general dental for the whole family, cosmetic dentistry, and restorative dental procedures like implants and dentures. Have a look through our services section for a better understanding of everything we’re able to do for you.');

        //                     } else if ($answer->getValue() == 'What if I have questions about a procedure before I come in for a consultation?') {
        //                         $botman->say('Answer: Call us at 0917-8926273. You’ll find our staff friendly and more than happy to take your questions.');

        //                     } else if ($answer->getValue() == 'Is this a pain-free dental practice?') {
        //                         $botman->say('Answer: Yes. We provide a Profound Numbing Guarantee, an assurance that your treatment will be a pain-free and comfortable experience. If you do begin to feel pain, we’ll immediately pause the treatment to administer more anesthetic, and only continue when we’re confident that you’ll be comfortable.');

        //                     } else if ($answer->getValue() == 'Can my whole family come in for treatment on the same day?') {
        //                         $botman->say('Answer: Our clinic is purpose-built to accommodate your entire family on the same day. We regularly treat patients of all ages and take the time to understand their unique dental and medical histories before providing treatment. Most of our patients consider us as their primary dentists to schedule routine dental appointments for their families and themselves.');
        //                     } else if ($answer->getValue() == 'Do you offer orthodontics?') {
        //                         $botman->say('Answer: Yes! We offer reliable and cost-effective orthodontic treatment to bring crooked teeth and gradually move them into the ideal position.');
        //                     } else if ($answer->getValue() == 'Can you provide dental implants?') {
        //                         $botman->say('Answer: We are experts in dental implants, from single implants to full implant dentures, to restore normal function and appearance to your mouth.');
        //                     } else if ($answer->getValue() == 'Do you offer cosmetic dentistry?') {
        //                         $botman->say('Answer: We offer a full array of cosmetic dental procedures, including teeth whitening, aligners, dental crowns, dental bonding, and even full mouth reconstructions to completely transform your smile.');
        //                     } else if ($answer->getValue() == 'How long will my first dental appointment last?') {
        //                         $botman->say('Answer: It varies but patients should plan on being with us for about an hour.');
        //                     } else if ($answer->getValue() == 'What are your credentials?') {
        //                         $botman->say('Answer: Our doctors have obtained their D.M.D. degrees. In addition, they’ve completed advanced training in many areas of general and surgical dentistry. We’re affiliated with the Philippine Dental Association (PDA). As well as being the main choice for family dentistry by our patients in the Quezon City and Malabon areas.');
        //                     } else if ($answer->getValue() == 'I’m scared of the dentist. Can you help me?') {
        //                         $botman->say('Answer: We are ready & eager to help you. Our experienced professionals (dentist & staff) provide patients with utmost care throughout their visit. Once your dental anxiety is taken care of, only then we shall proceed with treatment procedures.');
        //                     } else if ($answer->getValue() == 'Is it every patient has the same fee and costs for the same treatment?') {
        //                         $botman->say('Answer: Not at all, every patient has a different situation or condition, some patients required more treatment procedures, and some required less.');
        //                     } else if ($answer->getValue() == 'How long will it take to get an appointment?') {
        //                         $botman->say('Answer: We aim to be able to see you in our clinic within one (1) to two (2) days of your initial call.
        //                         <br>
        //                         <br>
        //                         If you are in need of an emergency appointment, we will do our best to see you on the same day. If we are unable to treat your specific emergency, we work closely with specialists in the area and will get you to a provider who can help.');
        //                     } else if ($answer->getValue() == 'Do you offer emergency appointments?') {
        //                         $botman->say('Answer: Yes, if you call on a day, we are open, we will do everything we can to see you the same day.');
        //                     } else if ($answer->getValue() == 'I need to cancel an appointment, what do I do?') {
        //                         $botman->say('Answer: Please call us at the clinic as soon as possible to cancel and reschedule your appointment.  Please let us know no later than 24 hours prior to your appointment.  Your appointment is reserved for you and no one else–we respect your time, and request the same in return.');
        //                     } else if ($answer->getValue() == 'What do I do if I missed my appointment?') {
        //                         $botman->say('Answer: in the event of a missed appointment or cancellation within 24 hours of your scheduled time, please call us as soon as possible after your missed appointment to reschedule.');
        //                     } else if ($answer->getValue() == 'Do I need to floss every day?') {
        //                         $botman->say('Answer: Only floss the teeth you want to keep!
        //                             <br>
        //                             <br>
        //                             Flossing requires more than just passing it through the space between your teeth.  Once you pass the floss between where your teeth contact, it’s important to then hug the floss around one of the teeth and advance it under the gumline.  Then hug the floss to the other tooth and advance it under the gumline.  It’s 3 steps! Floss contact, hug one tooth, then hug the other tooth.
        //                             ');
        //                     } else if ($answer->getValue() == 'Do I have to have the TV on during treatment?') {
        //                         $botman->say('Answer: “I don’t like distraction while in the dental chair, it just makes me more uneasy.” It is absolutely okay to feel this way, just please let us know and we will make sure to limit our patient comforts that are particularly distracting. We want you to be comfortable and are here to accommodate to your preferences.
        //                             ');
        //                     }
        //                 } else {
        //                     $botman->say('No category was selected');

        //                 }
        //             });

        //         });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you ' . $name);
        });
    }
}
