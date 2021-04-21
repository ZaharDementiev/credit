@extends('layouts.app')

@section('content')
<section class="loan">
    <div class='container'>
        <div class="loan__steps">
            <div class="loan__form">
                <div id="step-6" class="step step5 active">
                <h2>ПРОВЕРЯЕМ ВАШИ ДАННЫЕ</h2>
                <div action="" class="form">
                    <div class="form__desc">
                        <div class="text">Наши алгоритмы обрабатывают введённую Вами информацию.</div>
                        <div class="text2">Это займёт менее 10 секунд. Пожалуйста, не закрывайте страницу.</div>
                    </div>
                    <div class="form__searchCredit">
                        <div class="searchCredit">
                            <div class="searchCredit__top">
                                <div class="user-data">
                                    <div class="user-data__icon">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                                            <g>
                                                <path d="M38.914,0H6.5v60h47V14.586L38.914,0z M39.5,3.414L50.086,14H39.5V3.414z M8.5,58V2h29v14h14v42H8.5z"/>
                                                <path d="M42.5,21h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,21,42.5,21z"/>
                                                <path d="M22.875,18.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
                                                    C17.987,23.901,18.243,24,18.5,24c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
                                                    C23.936,17.943,23.306,17.874,22.875,18.219z"/>
                                                <path d="M42.5,32h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,32,42.5,32z"/>
                                                <path d="M22.875,29.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
                                                    C17.987,34.901,18.243,35,18.5,35c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
                                                    C23.936,28.943,23.306,28.874,22.875,29.219z"/>
                                                <path d="M42.5,43h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,43,42.5,43z"/>
                                                <path d="M22.875,40.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
                                                    C17.987,45.901,18.243,46,18.5,46c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
                                                    C23.936,39.943,23.306,39.874,22.875,40.219z"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="user-data__text">
                                        <div class="numb"><span>7291</span></div>
                                        <p>предложений проверено</p>
                                    </div>
                                </div>
                                <div class="user-data">
                                    <div class="user-data__icon">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                                            <g>
                                                <path d="M38.914,0H6.5v60h47V14.586L38.914,0z M39.5,3.414L50.086,14H39.5V3.414z M8.5,58V2h29v14h14v42H8.5z"/>
                                                <path d="M42.5,21h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,21,42.5,21z"/>
                                                <path d="M22.875,18.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
                                                    C17.987,23.901,18.243,24,18.5,24c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
                                                    C23.936,17.943,23.306,17.874,22.875,18.219z"/>
                                                <path d="M42.5,32h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,32,42.5,32z"/>
                                                <path d="M22.875,29.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
                                                    C17.987,34.901,18.243,35,18.5,35c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
                                                    C23.936,28.943,23.306,28.874,22.875,29.219z"/>
                                                <path d="M42.5,43h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,43,42.5,43z"/>
                                                <path d="M22.875,40.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
                                                    C17.987,45.901,18.243,46,18.5,46c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
                                                    C23.936,39.943,23.306,39.874,22.875,40.219z"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="user-data__text">
                                        <div class="numb"><span>100</span>%</div>
                                        <p>завершено</p>
                                    </div>
                                </div>
                            </div>
                            <div class="searchCredit__bottom">
                                <div class="progress" id="progressBar">
                                    <div class="progress__bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/jquery.spincrement.min.js" ></script>
<script>
function initAnimNumber(){
    $('.user-data__text .numb span').spincrement({
        thousandSeparator: "",
        duration: 9000
    });
    $('#progressBar').addClass('active')

    setTimeout(function (){
        $('#progressBarBtn').attr('disable',false);
        document.location.href = "{{route('offers')}}";
    },9000)

}
initAnimNumber()
</script>
@endsection