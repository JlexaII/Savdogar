@extends('layouts.app')

@section('title-block')
    О нас
@endsection

@section('content')
    <h1 class="p-3">Есть ли вопросы о компании?</h1>
    <p align="justify"> "Наша компания специализируется на продаже высококачественных фрезерных станков с числовым
        программным управлением
        (ЧПУ), предназначенных для обработки различных материалов. Мы предлагаем широкий выбор станков различной
        производительности и функциональности, отвечающих потребностям различных отраслей промышленности. Наши продукты
        отличаются надежностью, точностью и инновационными технологиями, что позволяет нашим клиентам повысить
        производительность и качество своей продукции. Мы также предлагаем консультации по выбору оборудования и обучение по
        его эксплуатации, обеспечивая полную поддержку нашим клиентам в процессе сотрудничества."</p>
    <div>
        <p>Это наше авторизационное письмо от компании производителя оборудования</p>
        <div class="bg-image hover-zoom">
            <img src="{{ asset('/image/autoriz.jpg') }}" class="w-25 img-thumbnail">
        </div>
    </div>
    <div>
        <p>Разрешение для ведения предпринимательской деятельсноти юридического лица</p>
        <embed src="/image/Davlat xizmatlari markazi.pdf" type="application/pdf" width="100%" height="100%">
    </div>
    <div>
        <p>Реквизиты компании</p>
        <p>
            MChJ “AXMEDOV’S” Ltd. <br> ИНН: 305763162
            <br>Hisob raqam/Расчётный счёт: Сум – 20208000100925388001
            <br>Uzbekistan, Sirdaryo region, Gulistan city. Uzbekistan shoh street 192-1
            <br><br>
            MFO/МФО: 00401 АО «Алокабанк» г.Ташкент, ул. А. Темура, 4. 100047 Узбекистан.
            <br>Account name: MChJ “Axmedov’s”
            <br>Account number: 20208840400925388001
            <br>Joint Stock Commercial “Aloqabank”
            <br>Address: A.Temur street, 4, Tashkent 100047 Uzbekistan
            <br>SWIFT: JSCLUZ22

        </p>
    </div>
@endsection
