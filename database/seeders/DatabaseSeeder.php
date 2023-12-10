<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MasterClassRegistration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        DB::table('creativity')->insert([
            [
                'name' => 'Архитектурное моделирование',
                'description' => 'Архитектурное моделирование — это изготовление моделей зданий, сооружений, исторических памятников, а также  инженерных и фортификационных сооружений. Отличительной особенностью образовательной программы является то, что она значительно расширяет пространство для изучения народных традиций, дает начальные навыки деревообработки,  формирует эстетический вкус у учащихся.
Данная программа не имеет аналогов среди образовательных дополнительных программ, так как впервые для изготовления макетов применяются бамбуковые палочки, в качестве основного элемента конструкции, что позволяет значительно упростить технологию создания макета и обучить начальным навыкам деревообработки.
Актуальность предлагаемой программы состоит в том, что мастер-классы по архитектурному моделированию способствуют воспитанию художественно-эмоционального отношения к работе и творчеству, готовым изделиям; умению наблюдать и создавать образы, композиции, архитектурные ансамбли, ландшафтные построения; овладению навыками дизайна; воспитанию бережного отношения к культурному наследию своего города, России; воспитанию гордости за свой народ, поддержание  интереса к его истории и  культуре.
На занятиях учащиеся получают теоретические знания по древнерусской архитектуре и народным традициям, изучают краеведческий материал, применяют знания на практике, создавая исторические реконструкции зданий и сооружений.',
                'image' => 'hover.png',
                'created_at' => now()
            ],
            [
                'name' => 'Кулинария',
                'description' => 'Кулинария – искусство приготовления пищи. Еда – это топливо, на котором работает организм, и знать об этом топливе, уметь грамотно его использовать должен любой человек. К сожалению, в большинстве случаев интерес к проблеме питания возникает с годами, когда большинство продуктов оказывается вредным для растущего организма.
Великие тайны кулинарии откроются перед теми, кто захочет научиться готовить по всем правилам, превращать сырые продукты во вкусную и полезную пищу. Умение хорошо, то есть правильно, вкусно и быстро, готовить является одним из условий счастливой, спокойной жизни.
«В здоровом теле – здоровый дух!» - настроение, здоровье, готовность трудиться во многом зависит от питания и отдыха. Важно не только правильно готовить, но и правильно питаться, регулировать не только объём пищи, но и её качество. Излишняя полнота и другие функциональные нарушения организма часто являются следствием неправильного питания. Владение кулинарией требует большого объёма знаний и навыков, значительной культуры и эрудиции, чтобы соответствовать современным требованиям.
Мы стремимся возродить традиции семейных праздников и здорового питания. Полученные знания помогут не только накормить семью, но и принять гостей.',
                'image' => 'chef.jpeg',
                'created_at' => now()
            ],
            [
                'name' => 'Резьба по дереву',
                'description' => 'Резьба по дереву - древнейший вид русского народного декоративного искусства. В нашей стране, богатой лесами, дерево всегда было одним из самых любимых материалов. Понимание его пластических качеств, красоты текстуры развивалось в творческом опыте многих поколений народных мастеров.
Высокий уровень исполнительского мастерства, образная и поэтическая выразительность деревянных изделий всегда соединялись с утилитарным назначением вещей. Это во многом определяло и способы художественной обработки, и характер орнаментального декора, сохраняющий единство как в монументальных произведениях домовой резьбы или скульптуры, так и в оформлении домашней утвари, начиная от ткацкого стана, прялки, рубеля и кончая деревянной посудой и детской игрушкой
Замечательное мастерство резьбы по дереву в наши дни развивают современные художники и мастера предприятий народных художественных промыслов.
Учитывая особенности каждого из традиционных центров художественной резьбы по дереву, программа ставит своей целью познакомить учащихся с наследием художественной обработки дерева в каждом районе промысла, привить им любовь к традиционному художественному ремеслу, обучить практическим навыкам резьбы по дереву, умению создавать собственные творческие композиции в традициях местного художественного промысла. ',
                'image' => 'woods.jpg',
                'created_at' => now()
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Елена Олеговна Блиновская',
                'phone' => 89120000005,
                'image' => 'driver1.png',
                'created_at' => now(),
                'email' => 'blinovskaya@ya.ru',
                'password' => '$2y$12$imkz9a2rkqzfHIfnFeJjnes.aHKvYV1GOUoY4Z/XPHNAXguXFCOVO', //user
                'isMaster' => true
            ],
            [
                'name' => 'Аяз Шабутдинов',
                'phone' => 89321111111,
                'image' => 'driver3.png',
                'created_at' => now(),
                'email' => 'ayaz@gmail.com',
                'password' => '$2y$12$imkz9a2rkqzfHIfnFeJjnes.aHKvYV1GOUoY4Z/XPHNAXguXFCOVO', //user
                'isMaster' => true
            ],
            [
                'name' => 'Оксана Валерьевна Самойлова',
                'phone' => 89122222222,
                'image' => 'driver2.png',
                'created_at' => now(),
                'email' => 'dzhigan@bk.ru',
                'password' => '$2y$12$imkz9a2rkqzfHIfnFeJjnes.aHKvYV1GOUoY4Z/XPHNAXguXFCOVO', //user
                'isMaster' => true
            ]
        ]);

        DB::table('master_classes')->insert([
            [
                'name' => '«Моделирование моделей транспорта»',
                'description' => 'Мастер-класс «Моделирование моделей транспорта» научит основам моделирования различных
                видов транспортных средств. Ученики строят, испытывают и запускают модели судов, самолетов и
                автомобилей.',
                'cost' => 5500,
                'created_at' => now(),
                'creativityId' => 1,
                'creatorId' => 12,
                'limit' => 5,
                'startAt' => date('2024-01-15 09:00:00.000')
//                'date' => Carbon::createFromFormat('d.m.Y', '10.01.2024'),
//                'time' => Carbon::createFromFormat('H:i', '12:00')->format('H:i')
            ],
            [
                'name' => '«Моделирование зданий и сооружений»',
                'description' => 'Мастер-класс «Моделирование зданий и сооружений».
                Опытные педагоги научат моделировать различные элементы малоэтажных жилых и нежилых зданий,
                конструировать разные виды крыш и стен, а также собирать из элементов здания различной архитектуры.',
                'cost' => 8000,
                'created_at' => now(),
                'creativityId' => 1,
                'creatorId' => 12,
                'limit' => 7,
                'startAt' => date('2024-01-16 11:00:00.000')
//                'date' => Carbon::createFromFormat('d.m.Y', '11.01.2024'),
//                'time' => Carbon::createFromFormat('H:i', '15:00')->format('H:i')
            ],
            [
                'name' => '«Шоколадные поделки»',
                'description' => 'Мастер-класс «Шоколадные поделки»
                Шоколадные фонтаны, фруктовые пальмы, приготовление шоколадных конфет, мороженого и других сладостей.
                Вы готовите только из проверенных компонентов, делаете яства с любовью, что, несомненно, отражается на
                их вкусе. Мы научим вас делать любой праздник оригинальнее и вкуснее!',
                'cost' => 7750,
                'created_at' => now(),
                'creativityId' => 2,
                'creatorId' => 13,
                'limit' => 1,
                'startAt' => date('2024-01-01 09:00:00.000')
//                'date' => Carbon::createFromFormat('d.m.Y', '12.01.2024'),
//                'time' => Carbon::createFromFormat('H:i', '18:00')->format('H:i')
            ],
            [
                'name' => '«Приготовление стейков»',
                'description' => 'Мастер-класс «Приготовление стейков»
                Мы все любим стейки, но не у каждого из нас получается их правильно приготовить. На этом мастер-классе
                мы расскажем вам всё о стейках: как выбрать мясо, какую часть использовать для того или иного вида
                стейка, какие степени прожарки бывают. Мы приготовим гарнир и идеальный соус. Теперь вы сможете
                порадовать своих гостей и себя самого идеальными стейками!',
                'cost' => 6350,
                'created_at' => now(),
                'creativityId' => 2,
                'creatorId' => 13,
                'limit' => 10,
                'startAt' => date('2024-02-16 09:00:00.000')
//                'date' => Carbon::createFromFormat('d.m.Y', '15.01.2024'),
//                'time' => Carbon::createFromFormat('H:i', '12:00')->format('H:i')
            ],
            [
                'name' => '«Геометрическая резьба по дереву»',
                'description' => 'Мастер-класс «Геометрическая резьба по дереву».
                Данный мастер-класс для начинающих, знакомит с геометрической резьбой, с самых основных элементов.
                Несложными движениями и творческим комбинированием создаются удивительные узоры на дереве. ',
                'cost' => 10000,
                'created_at' => now(),
                'creativityId' => 3,
                'creatorId' => 11,
                'limit' => 6,
                'startAt' => date('2024-02-01 13:00:00.000')
//                'date' => Carbon::createFromFormat('d.m.Y', '16.01.2024'),
//                'time' => Carbon::createFromFormat('H:i', '11:00')->format('H:i')
            ],
            [
                'name' => '«Деревянные игрушки»',
                'description' => 'Мастер-класс «Деревянные игрушки».
                На мастер-классе вы научитесь вырезать фигурки животных из качественных пород дерева с помощью
                профессиональных инструментов. Обработка фигурок натуральными составами обеспечит прочность,
                долговечность и экологичность созданных игрушек. ',
                'cost' => 3000,
                'created_at' => now(),
                'creativityId' => 3,
                'creatorId' => 11,
                'limit' => 20,
                'startAt' => date('2024-02-06 15:00:00.000')
//                'date' => Carbon::createFromFormat('d.m.Y', '20.01.2024'),
//                'time' => Carbon::createFromFormat('H:i', '09:00')->format('H:i')
            ]
        ]);

//        MasterClassRegistration::factory(30)->create();
    }
}
