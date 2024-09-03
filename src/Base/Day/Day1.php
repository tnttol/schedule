<?php declare(strict_types=1);

namespace App\Base\Day;

use App\Base\DayInterface;
use App\Base\Lesson\Lesson1;
use App\Base\Lesson\Lesson2;
use App\Base\Lesson\Lesson3;
use App\Base\Lesson\Lesson4;
use App\Base\Lesson\Lesson5;
use App\Base\Lesson\Lesson6;
use App\Base\Lesson\Lesson7;
use App\Base\Subject\EnglishLanguage;
use App\Base\Subject\ForeignLiterature;
use App\Base\Subject\Geography;
use App\Base\Subject\Mathematics;
use App\Base\Subject\Music;
use App\Base\Subject\PhysicalTraining;
use App\Base\Subject\UkrainianLanguage;

class Day1 extends AbstractDay implements DayInterface
{
    public function __construct()
    {
        $this
            ->addLesson((new Lesson1())->addSubject(new UkrainianLanguage()))
            ->addLesson((new Lesson2())->addSubject(new PhysicalTraining()))
            ->addLesson((new Lesson3())->addSubject(new EnglishLanguage()))
            ->addLesson((new Lesson4())->addSubject(new ForeignLiterature()))
            ->addLesson((new Lesson5())->addSubject(new Geography()))
            ->addLesson((new Lesson6())->addSubject(new Mathematics()))
            ->addLesson((new Lesson7())->addSubject(new Music()))
        ;
    }
}
