@extends('layouts.app')

@section('content')
    <section class="offers">
        <div class="offers-first">
            <div class="container">
                <div class="offers__header">
                    <div class="offers__header-top">
                        <span><span class="person_name">111</span>, ваш кредитный балл по оценке нашей системы, слишком мал, для одобрения займа у нас <b>28</b></span>
                        <span class="number">28</span>
                    </div>
                    <div class="offers__header-bottom">
                        Но, на основе ваших данных мы подобрали для вас предложения у других сервисов и посчитали вероятность одобрения.
                        <br> <span>Заполните минимум 3 заявки на займ для гарантированного результата</span>
                    </div>
                </div>
            </div>
        </div>
        <div class='container second'>
            <div class="offers__content">
                <div class="offers__list">
                    <h2>ВСЕ ПРЕДЛОЖЕНИЯ</h2>
                    <ul>
                        @foreach($offers as $offer)
                            <li>
                                <div class="offers-pic">
                                    <img src="{{$offer->src}}" alt="logo">
                                </div>
                                <div class="offers-money">
                                    <div>от 0% в день</div>
                                    <div><small>до </small>{{$offer->amount}}₽</div>
                                </div>
                                <div class="offers-chance">
                                    <div>Вероятность</div>
                                    <div>{{$offer->probability}}%</div>
                                </div>
                                <a href="https://go.leadgid.ru/aff_c?offer_id=2973&aff_id=32561&aff_sub=vit" class="js-offer-elem btn" data-id="21" target="_blank">Получить</a>
                            </li>
                        @endforeach
                    </ul>
<!--                    <div class="offers-btn">-->
<!--                        <a href="#" class="btn_white">Еще варианты</a>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </section>
<script>
console.log(localStorage.getItem('person_name'));
if(localStorage.getItem('person_name')) {
    document.querySelector('.person_name').innerHTML = localStorage.getItem('person_name');
}
</script>
@endsection
