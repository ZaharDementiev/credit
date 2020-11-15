@extends('layouts.app')

@section('content')
    <section class="callBack">
        <div class='container'>
            <div class="callBack__form">
                <h2>ОТПИСАТЬСЯ ОТ SMS РАССЫЛКИ </h2>
                <p>Чтобы отменить SMS рассылку, введите телефон, указанный при регистрации</p>
                <form action="" class="form">
                    <div class="form__group">
                        <label>Номер телефона <span>*</span></label>
                        <input type="text" value="+7" name="phone">
                    </div>
                    <div class="form__footer">
                        <a href="index.html"  class="black">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.125 5.62497H2.64394L5.50856 2.89647C5.65856 2.75359 5.66437 2.51622 5.5215 2.36622C5.37881 2.21641 5.14144 2.21041 4.99125 2.35328L1.71975 5.46953C1.57819 5.61128 1.5 5.79953 1.5 5.99997C1.5 6.20022 1.57819 6.38866 1.72631 6.53659L4.99144 9.64647C5.064 9.71566 5.157 9.74997 5.25 9.74997C5.349 9.74997 5.448 9.71097 5.52169 9.63353C5.66456 9.48353 5.65875 9.24634 5.50875 9.10347L2.63213 6.37497H10.125C10.332 6.37497 10.5 6.20697 10.5 5.99997C10.5 5.79297 10.332 5.62497 10.125 5.62497Z" fill="#828282"/>
                            </svg>
                            Назад
                        </a>
                        <button>ОТПРАВИТЬ</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
