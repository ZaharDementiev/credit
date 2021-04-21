@extends('layouts.app')

@section('content')
    <section class="loan">
        <div class='container'>
            <div class="loan__timer">
                <div class="time" id="doc_time">
                    20:00

                </div>
                <div class="info">
                    <div class="text">ЗАЙМ ПОД 0%</div>
                    <p>Осталось <span id="doc_timeMin">20</span> минут</p>
                </div>
            </div>
            <div class="loan__steps">
                <div class="loan__steps-list">
                    <div class="mob_title">Шаг первый</div>
                    <ul>
                        <li class="active" id="step-1ul"><span>1</span></li>
                        <li class="line" data-step="1">
                            <div class="svgWrapp">
                                <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.66177 1.07083L8.42078 0.863796C8.02076 0.520043 7.41965 0.55836 7.06649 0.949992L3.03508 5.42003L1.81819 4.37196C1.41859 4.02782 0.817391 4.06537 0.463802 4.45658L0.250727 4.69236C0.0779334 4.88345 -0.011785 5.13552 0.00124423 5.393C0.014402 5.65034 0.129206 5.89193 0.32059 6.06465L2.55122 8.10734C2.74435 8.2887 3.00317 8.38328 3.26772 8.36924C3.53227 8.35524 3.77961 8.2337 3.95242 8.03289L8.7649 2.44111C8.93303 2.24575 9.01662 1.99162 8.99724 1.73467C8.97788 1.47753 8.85724 1.23878 8.66177 1.07083Z" fill="#4892F3"/>
                                </svg>
                            </div>
                        </li>
                        <li id="step-2ul"><span>2</span></li>
                        <li class="line" data-step="2">
                            <div class="svgWrapp">
                                <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.66177 1.07083L8.42078 0.863796C8.02076 0.520043 7.41965 0.55836 7.06649 0.949992L3.03508 5.42003L1.81819 4.37196C1.41859 4.02782 0.817391 4.06537 0.463802 4.45658L0.250727 4.69236C0.0779334 4.88345 -0.011785 5.13552 0.00124423 5.393C0.014402 5.65034 0.129206 5.89193 0.32059 6.06465L2.55122 8.10734C2.74435 8.2887 3.00317 8.38328 3.26772 8.36924C3.53227 8.35524 3.77961 8.2337 3.95242 8.03289L8.7649 2.44111C8.93303 2.24575 9.01662 1.99162 8.99724 1.73467C8.97788 1.47753 8.85724 1.23878 8.66177 1.07083Z" fill="#4892F3"/>
                                </svg>
                            </div>
                        </li>
                        <li id="step-3ul"><span>3</span></li>
                        <li class="line" data-step="3">
                            <div class="svgWrapp">
                                <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.66177 1.07083L8.42078 0.863796C8.02076 0.520043 7.41965 0.55836 7.06649 0.949992L3.03508 5.42003L1.81819 4.37196C1.41859 4.02782 0.817391 4.06537 0.463802 4.45658L0.250727 4.69236C0.0779334 4.88345 -0.011785 5.13552 0.00124423 5.393C0.014402 5.65034 0.129206 5.89193 0.32059 6.06465L2.55122 8.10734C2.74435 8.2887 3.00317 8.38328 3.26772 8.36924C3.53227 8.35524 3.77961 8.2337 3.95242 8.03289L8.7649 2.44111C8.93303 2.24575 9.01662 1.99162 8.99724 1.73467C8.97788 1.47753 8.85724 1.23878 8.66177 1.07083Z" fill="#4892F3"/>
                                </svg>
                            </div>
                        </li>
                        <li id="step-4ul"><span>4</span></li>
                    </ul>
                </div>
                    <div class="loan__form">
                        <form action="{{route('save.data')}}" method="post" class="form">
                            @csrf
                            <div id="step-1" class="step active">
                                <h2>КОНТАКТНАЯ ИНФОРМАЦИЯ</h2>
                                <div class="step__name">Шаг первый</div>
                                <div class="form__groupsTWO">
                                    <div class="form__group">
                                        <label>Номер телефона <span>*</span></label>
                                        <input type="tel" name="phone" id="phoneX" placeholder="+7" inputmode="numeric">
                                    </div>
                                    <div class="form__group">
                                        <label>E-mail</label>
                                        <input type="text" name="email" id="emailX" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="form__checkInfo">
                                    <input type="checkbox" class="checkbox" checked id="checkbox" name="info"/>
                                    <label for="checkbox">
                                        <div class="mob">Я согласен *</div>
                                        <p>
                                            <span class="desc">Даю свое согласие </span>
                                            <span class="mob">* Согласие </span>
                                            на <a href="pdf/for_the_processing_of_personal_data.pdf" target="_blank">обработку персональных данных</a> и <a href="pdf/new.pdf" target="_blank">на получение рекламных материалов</a>, соглашаюсь с <a href="pdf/application-service_rates.pdf" target="_blank">условиями публичной оферты и тарифами сервиса</a>. Осознаю, что оплата услуг не гарантирует получение займа.
                                        </p>
                                    </label>
                                </div>
                                <div class="form__footer">
                                    <a href="index.html"  class="black">
                                        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.335659 8.68422L7.9195 1.10021C8.13599 0.883721 8.42452 0.764893 8.73217 0.764893C9.04017 0.764893 9.32854 0.883892 9.54502 1.10021L10.2336 1.78893C10.4499 2.00508 10.5691 2.29378 10.5691 2.60161C10.5691 2.90927 10.4499 3.2077 10.2336 3.42385L5.80927 7.85788H19.8655C20.4992 7.85788 21 8.35403 21 8.98795V9.96162C21 10.5955 20.4992 11.1417 19.8655 11.1417H5.75908L10.2334 15.6005C10.4497 15.817 10.5689 16.0978 10.5689 16.4057C10.5689 16.7132 10.4497 16.9981 10.2334 17.2144L9.54485 17.9009C9.32836 18.1174 9.04 18.2354 8.732 18.2354C8.42435 18.2354 8.13581 18.1159 7.91933 17.8994L0.335487 10.3155C0.11849 10.0984 -0.000850677 9.80848 3.8147e-06 9.50031C-0.000679016 9.19112 0.11849 8.90105 0.335659 8.68422Z" fill="#4892F3" fill-opacity="0.5"/>
                                        </svg>
                                        <span>Назад</span>
                                    </a>
                                    <div class="button" data-href="#step-2" id="btnStep1">Далее</div>
                                </div>
                            </div>
                            
                            <div id="step-2" class="step">
                                <h2>ЛИЧНЫЕ ДАННЫЕ</h2>
                                <div class="step__name">Шаг второй</div>

                                    <div class="form__groupsTREE">
                                        <div class="form__group">
                                            <label>Фамилия <span>*</span></label>
                                            <input type="text"  name="lastname" placeholder="Фамилия" id="lastname">
                                        </div>
                                        <div class="form__group">
                                            <label>Имя <span>*</span></label>
                                            <input type="text"  name="firstname" placeholder="Имя" id="firstname">
                                        </div>
                                        <div class="form__group">
                                            <label>Отчество (если есть)</label>
                                            <input type="text" name="surname" placeholder="Отчество (если есть)"  id="surname">
                                        </div>
                                        <div class="form__group">
                                            <label>Дата рождения <span>*</span></label>
                                            <input type="text" inputmode="numeric" name="date" placeholder="ДД/ММ/ГГГГ" id="date">
                                        </div>
                                        <div class="form__group gender">
                                            <label class="genderLabel">Пол <span>*</span></label>
                                            <div class="form__radio">
                                                <input type="radio" class="radio" id="radio1" name="gender" checked/>
                                                <label for="radio1" class="male"><div>М</div></label>
                                            </div>
                                            <div class="form__radio">
                                                <input type="radio" class="radio" id="radio2" name="gender" />
                                                <label for="radio2" class="female"><div>Ж</div></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form__groupsTWO select">
                                        <div class="form__group">
                                            <label>Сумма займа <span>*</span></label>
                                            <input type="text" name="summDolg" inputmode="numeric" placeholder="500000" id="summDolg">
                                        </div>
                                        <div class="form__group">
                                            <label>Цель займа</label>
                                            <select class="custom" name="" id="purpose">
                                                <option disabled>Цель</option>
                                                <option value="1">На личные расходы</option>
                                                <option value="2">Автомобиль</option>
                                                <option value="3">Квартира</option>
                                                <option value="4">Подарок</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form__footer">
                                        <a href="javascript:void(0)" data-step="0" data-href="#step-1" class="black btn-stepsBlack">
                                            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.335659 8.68422L7.9195 1.10021C8.13599 0.883721 8.42452 0.764893 8.73217 0.764893C9.04017 0.764893 9.32854 0.883892 9.54502 1.10021L10.2336 1.78893C10.4499 2.00508 10.5691 2.29378 10.5691 2.60161C10.5691 2.90927 10.4499 3.2077 10.2336 3.42385L5.80927 7.85788H19.8655C20.4992 7.85788 21 8.35403 21 8.98795V9.96162C21 10.5955 20.4992 11.1417 19.8655 11.1417H5.75908L10.2334 15.6005C10.4497 15.817 10.5689 16.0978 10.5689 16.4057C10.5689 16.7132 10.4497 16.9981 10.2334 17.2144L9.54485 17.9009C9.32836 18.1174 9.04 18.2354 8.732 18.2354C8.42435 18.2354 8.13581 18.1159 7.91933 17.8994L0.335487 10.3155C0.11849 10.0984 -0.000850677 9.80848 3.8147e-06 9.50031C-0.000679016 9.19112 0.11849 8.90105 0.335659 8.68422Z" fill="#4892F3" fill-opacity="0.5"/>
                                            </svg>
                                            <span>Назад</span>
                                        </a>
                                        <div class="button" data-href="#step-3" id="btnStep2">Далее</div>
                                    </div>
                            </div>
                            <div id="step-3" class="step">
                                <h2>ПАСПОРТНЫЕ ДАННЫЕ</h2>
                                <div class="step__name">Шаг третий</div>
                                <div class="form__groupsTREE">
                                    <div class="form__group">
                                        <label>Серия </label>
                                        <input type="text" inputmode="numeric"  placeholder="_ _   _ _" id="series">
                                    </div>
                                    <div class="form__group">
                                        <label>Номер</label>
                                        <input type="text" inputmode="numeric" placeholder="_ _ _   _ _ _" id="room">
                                    </div>
                                    <div class="form__group">
                                        <label>Код подразделения</label>
                                        <input name="code" inputmode="numeric" type="text" placeholder="_ _ _ - _ _ _" id="codeSubdivisions">
                                    </div>
                                </div>
                                <div class="form__groupsTWO">
                                    <div class="form__group">
                                        <label>Место рождения</label>
                                        <input type="text" name="placeBirth" id="placeBirth">
                                    </div>
                                </div>
                                <div class="form__footer">
                                    <a href="javascript:void(0)" data-step="1" data-href="#step-2" class="black btn-stepsBlack">
                                        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.335659 8.68422L7.9195 1.10021C8.13599 0.883721 8.42452 0.764893 8.73217 0.764893C9.04017 0.764893 9.32854 0.883892 9.54502 1.10021L10.2336 1.78893C10.4499 2.00508 10.5691 2.29378 10.5691 2.60161C10.5691 2.90927 10.4499 3.2077 10.2336 3.42385L5.80927 7.85788H19.8655C20.4992 7.85788 21 8.35403 21 8.98795V9.96162C21 10.5955 20.4992 11.1417 19.8655 11.1417H5.75908L10.2334 15.6005C10.4497 15.817 10.5689 16.0978 10.5689 16.4057C10.5689 16.7132 10.4497 16.9981 10.2334 17.2144L9.54485 17.9009C9.32836 18.1174 9.04 18.2354 8.732 18.2354C8.42435 18.2354 8.13581 18.1159 7.91933 17.8994L0.335487 10.3155C0.11849 10.0984 -0.000850677 9.80848 3.8147e-06 9.50031C-0.000679016 9.19112 0.11849 8.90105 0.335659 8.68422Z" fill="#4892F3" fill-opacity="0.5"/>
                                        </svg>
                                        <span>Назад</span>
                                    </a>
                                    <div class="button" data-href="#step-5" id="btnStep3">Далее</div>
                                </div>
                            </div>
                            <!-- <div id="step-4" class="step">
                                <h2>АДРЕС РЕГИСТРАЦИИ</h2>
                                <div class="step__name">Шаг четвёртый</div>
                                <div class="form__groupsTWO">
                                    <div class="form__group">
                                        <label>Регион <span>*</span></label>
                                        <input type="text" id="region1" placeholder="Ваш регион">
                                    </div>
                                    <div class="form__group">
                                        <label>Город <span>*</span></label>
                                        <input type="text" id="city1" placeholder="Ваш город">
                                    </div>
                                </div>
                                <div class="form__groupsTREE">
                                    <div class="form__group">
                                        <label>Улица <span>*</span></label>
                                        <input type="text" id="street1" placeholder="Ваша улица">
                                    </div>
                                    <div class="form__group">
                                        <label>Дом <span>*</span></label>
                                        <input type="text" id="house1" placeholder="Дом">
                                    </div>
                                    <div class="form__group">
                                        <label>Квартира <span>*</span></label>
                                        <input name="flat" id="flat1" type="text" placeholder="Квартира">
                                    </div>
                                    <div class="form__group factic gender">
                                        <label>Совпадает с фактическим?</label>
                                        <div class="form__radio">
                                            <input type="radio" class="radio radioDual" value="0" id="radio3" name="dual" checked/>
                                            <label for="radio3" class="yes"><div>Да</div></label>
                                        </div>
                                        <div class="form__radio">
                                            <input type="radio" class="radio radioDual" value="1" id="radio4" name="dual" />
                                            <label for="radio4" class="no"><div>Нет</div></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="actual-info">
                                    <h2>ФАКТИЧЕСКИЙ АДРЕС</h2>
                                    <div class="form__groupsTWO">
                                        <div class="form__group">
                                            <label>Регион <span>*</span></label>
                                            <input type="text" id="region2" placeholder="Ваш регион">
                                        </div>
                                        <div class="form__group">
                                            <label>Город <span>*</span></label>
                                            <input type="text"  id="city2" placeholder="Ваш город">
                                        </div>
                                    </div>
                                    <div class="form__groupsTREE">
                                        <div class="form__group">
                                            <label>Улица <span>*</span></label>
                                            <input type="text" id="street2" placeholder="Ваша улица">
                                        </div>
                                        <div class="form__group">
                                            <label>Дом <span>*</span></label>
                                            <input type="text" id="house2" placeholder="Дом">
                                        </div>
                                        <div class="form__group">
                                            <label>Квартира <span>*</span></label>
                                            <input type="text" id="flat2" placeholder="Квартира">
                                        </div>
                                    </div>
                                </div>
                                <div class="form__footer">
                                    <a href="javascript:void(0)" data-href="#step-3" class="black btn-stepsBlack">
                                        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.335659 8.68422L7.9195 1.10021C8.13599 0.883721 8.42452 0.764893 8.73217 0.764893C9.04017 0.764893 9.32854 0.883892 9.54502 1.10021L10.2336 1.78893C10.4499 2.00508 10.5691 2.29378 10.5691 2.60161C10.5691 2.90927 10.4499 3.2077 10.2336 3.42385L5.80927 7.85788H19.8655C20.4992 7.85788 21 8.35403 21 8.98795V9.96162C21 10.5955 20.4992 11.1417 19.8655 11.1417H5.75908L10.2334 15.6005C10.4497 15.817 10.5689 16.0978 10.5689 16.4057C10.5689 16.7132 10.4497 16.9981 10.2334 17.2144L9.54485 17.9009C9.32836 18.1174 9.04 18.2354 8.732 18.2354C8.42435 18.2354 8.13581 18.1159 7.91933 17.8994L0.335487 10.3155C0.11849 10.0984 -0.000850677 9.80848 3.8147e-06 9.50031C-0.000679016 9.19112 0.11849 8.90105 0.335659 8.68422Z" fill="#4892F3" fill-opacity="0.5"/>
                                        </svg>
                                        <span>Назад</span>
                                    </a>
                                    <div class="button" data-href="#step-5" id="btnStep4">Отправить</div>
                                </div>
                            </div> -->
                            <div id="step-5" class="step">
                                <h2>Банковские реквизиты</h2>
                                <div class="form">
                                    <div class="form__desc">
                                        <div class="text-new">
                                            При одобрении, на вашу банковскую карту прийдут деньги, для этого вам необходимо привязать карту
                                        </div>
                                    </div>
                                    <div class="box-next-offers">
                                        <button class="href" type="submit">Привязать карту</div>
                                    </div>
                                    <div class="mob_desc">С вашей карты снимут 1 рубль для проверки</div>
                                    <a href="javascript:void(0)" data-step="2" data-href="#step-3" class="black btn-stepsBlack">
                                        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.335659 8.68422L7.9195 1.10021C8.13599 0.883721 8.42452 0.764893 8.73217 0.764893C9.04017 0.764893 9.32854 0.883892 9.54502 1.10021L10.2336 1.78893C10.4499 2.00508 10.5691 2.29378 10.5691 2.60161C10.5691 2.90927 10.4499 3.2077 10.2336 3.42385L5.80927 7.85788H19.8655C20.4992 7.85788 21 8.35403 21 8.98795V9.96162C21 10.5955 20.4992 11.1417 19.8655 11.1417H5.75908L10.2334 15.6005C10.4497 15.817 10.5689 16.0978 10.5689 16.4057C10.5689 16.7132 10.4497 16.9981 10.2334 17.2144L9.54485 17.9009C9.32836 18.1174 9.04 18.2354 8.732 18.2354C8.42435 18.2354 8.13581 18.1159 7.91933 17.8994L0.335487 10.3155C0.11849 10.0984 -0.000850677 9.80848 3.8147e-06 9.50031C-0.000679016 9.19112 0.11849 8.90105 0.335659 8.68422Z" fill="#4892F3" fill-opacity="0.5"/>
                                        </svg>
                                        Назад
                                    </a>
                                </div>
                            </div>
                        </form>
                    <!--<div id="step-3" class="step">
                        <h2>ПАСПОРТНЫЕ ДАННЫЕ</h2>
                        <div class="step__name">Шаг третий</div>
                        <form action="" class="form">
                            <div class="form__groupsTREE">
                                <div class="form__group">
                                    <label>Серия  <span>*</span></label>
                                    <input type="text"  placeholder="_ _   _ _" id="series">
                                </div>
                                <div class="form__group">
                                    <label>Номер <span>*</span></label>
                                    <input type="text" placeholder="_ _ _   _ _ _" id="room">
                                </div>
                                <div class="form__group">
                                    <label>Код подразделения</label>
                                    <input type="text" placeholder="_ _ _ - _ _ _" id="codeSubdivisions">
                                </div>
                            </div>
                            <div class="form__groupsTWO">
                                <div class="form__group">
                                    <label>Место рождения <span>*</span></label>
                                    <input type="text" name="placeBirth" id="placeBirth">
                                </div>
                            </div>
                            <div class="form__footer">
                                <a href="javascript:void(0)" data-href="#step-2" class="black btn-stepsBlack">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.125 5.62497H2.64394L5.50856 2.89647C5.65856 2.75359 5.66437 2.51622 5.5215 2.36622C5.37881 2.21641 5.14144 2.21041 4.99125 2.35328L1.71975 5.46953C1.57819 5.61128 1.5 5.79953 1.5 5.99997C1.5 6.20022 1.57819 6.38866 1.72631 6.53659L4.99144 9.64647C5.064 9.71566 5.157 9.74997 5.25 9.74997C5.349 9.74997 5.448 9.71097 5.52169 9.63353C5.66456 9.48353 5.65875 9.24634 5.50875 9.10347L2.63213 6.37497H10.125C10.332 6.37497 10.5 6.20697 10.5 5.99997C10.5 5.79297 10.332 5.62497 10.125 5.62497Z" fill="#828282"/>
                                    </svg>
                                    Назад
                                </a>
                                <div class="button" data-href="#step-4" id="btnStep3">ОТПРАВИТЬ</div>
                            </div>
                        </form>
                    </div>
                    <div id="step-4" class="step">
                        <h2>АДРЕС РЕГИСТРАЦИИ</h2>
                        <div class="step__name">Шаг четвёртый</div>
                        <form action="" class="form">
                            <div class="form__groupsTWO">
                                <div class="form__group">
                                    <label>Регион <span>*</span></label>
                                    <input type="text" id="region1">
                                </div>
                                <div class="form__group">
                                    <label>Город <span>*</span></label>
                                    <input type="text" id="city1">
                                </div>
                            </div>
                            <div class="form__groupsTREE">
                                <div class="form__group">
                                    <label>Улица <span>*</span></label>
                                    <input type="text" id="street1">
                                </div>
                                <div class="form__group">
                                    <label>Дом  <span>*</span></label>
                                    <input type="text" id="house1">
                                </div>
                                <div class="form__group">
                                    <label>Квартира</label>
                                    <input type="text">
                                </div>
                                <div class="form__group gender">
                                    <label>Совпадает с фактическим? <span>*</span></label>
                                    <div class="form__radio">
                                        <input type="radio" class="radio radioDual" value="0" id="radio3" name="dual" checked/>
                                        <label for="radio3">Да</label>
                                    </div>
                                    <div class="form__radio">
                                        <input type="radio" class="radio radioDual" value="1" id="radio4" name="dual" />
                                        <label for="radio4">Нет</label>
                                    </div>
                                </div>
                            </div>
                            <div class="actual-info">
                                <h2>ФАКТИЧЕСКИЙ АДРЕС</h2>
                                <div class="form__groupsTWO">
                                    <div class="form__group">
                                        <label>Регион <span>*</span></label>
                                        <input type="text" id="region2" >
                                    </div>
                                    <div class="form__group">
                                        <label>Город <span>*</span></label>
                                        <input type="text"  id="city2">
                                    </div>
                                </div>
                                <div class="form__groupsTREE">
                                    <div class="form__group">
                                        <label>Улица <span>*</span></label>
                                        <input type="text" id="street2">
                                    </div>
                                    <div class="form__group">
                                        <label>Дом  <span>*</span></label>
                                        <input type="text" id="house2">
                                    </div>
                                    <div class="form__group">
                                        <label>Квартира</label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form__footer">
                                <a href="javascript:void(0)" data-href="#step-3" class="black btn-stepsBlack">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.125 5.62497H2.64394L5.50856 2.89647C5.65856 2.75359 5.66437 2.51622 5.5215 2.36622C5.37881 2.21641 5.14144 2.21041 4.99125 2.35328L1.71975 5.46953C1.57819 5.61128 1.5 5.79953 1.5 5.99997C1.5 6.20022 1.57819 6.38866 1.72631 6.53659L4.99144 9.64647C5.064 9.71566 5.157 9.74997 5.25 9.74997C5.349 9.74997 5.448 9.71097 5.52169 9.63353C5.66456 9.48353 5.65875 9.24634 5.50875 9.10347L2.63213 6.37497H10.125C10.332 6.37497 10.5 6.20697 10.5 5.99997C10.5 5.79297 10.332 5.62497 10.125 5.62497Z" fill="#828282"/>
                                    </svg>
                                    Назад
                                </a>
                                <div class="button" data-href="#step-5" id="btnStep4">ОТПРАВИТЬ</div>
                            </div>
                        </form>
                    </div>
                    <div id="step-5" class="step step5">
                        <h2>ПРОВЕРЯЕМ ВАШИ ДАННЫЕ</h2>
                        <div class="step__name">Шаг четвёртый</div>
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
                            <div class="form__footer">
                                <a href="javascript:void(0)" data-href="#step-3" class="black btn-stepsBlack">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.125 5.62497H2.64394L5.50856 2.89647C5.65856 2.75359 5.66437 2.51622 5.5215 2.36622C5.37881 2.21641 5.14144 2.21041 4.99125 2.35328L1.71975 5.46953C1.57819 5.61128 1.5 5.79953 1.5 5.99997C1.5 6.20022 1.57819 6.38866 1.72631 6.53659L4.99144 9.64647C5.064 9.71566 5.157 9.74997 5.25 9.74997C5.349 9.74997 5.448 9.71097 5.52169 9.63353C5.66456 9.48353 5.65875 9.24634 5.50875 9.10347L2.63213 6.37497H10.125C10.332 6.37497 10.5 6.20697 10.5 5.99997C10.5 5.79297 10.332 5.62497 10.125 5.62497Z" fill="#828282"/>
                                    </svg>
                                    Назад
                                </a>
                                <button type="submit" class="button" data-href="#step-6" id="progressBarBtn">Продолжить</button>
                            </div>
                        </div>
                    </div>
                    <div id="step-6" class="step">
                        <h2>НЕ ХВАТАЕТ БАНКОВСКИХ РЕКВИЗИТОВ</h2>
                        <div class="form">
                            <div class="form__desc">
                                <div class="text">Мы спишем с Вашей карты 1 рубль для ее проверки. Это не обязывает Вас брать займ.
                                    <br>
                                    Комиссия сервиса 398 руб. каждые 5 дней.</div>
                            </div>
                            <div class="form__card">
                                <div class="card-front">
                                    <div class="card-front__top">
                                        <div class="card-ico mir">
                                            <svg viewBox="0 0 70 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g id="current" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="04-babules-anketa-step-03@2x" transform="translate(-586.000000, -422.000000)" fill="#FFFFFF">
                                                        <g id="form" transform="translate(280.000000, 199.000000)">
                                                            <g id="credit-card" transform="translate(200.000000, 194.000000)">
                                                                <g id="card-face">
                                                                    <g id="mir_logo" transform="translate(106.000000, 29.000000)">
                                                                        <path d="M62.1428571,0 L48.8571429,0 C49.5714286,4.42857143 53.8571429,8.57142857 58.5714286,8.57142857 L69.1428571,8.57142857 C69.2857143,8.14285714 69.2857143,7.57142857 69.2857143,7.14285714 C69.2857143,3.14285714 66.1428571,0 62.1428571,0 Z" id="path10"></path>
                                                                        <path d="M50,9.28571429 L50,20 L56.4285714,20 L56.4285714,14.2857143 L62.1428571,14.2857143 C65.2857143,14.2857143 68,12.1428571 68.8571429,9.28571429 L50,9.28571429 Z" id="path12"></path>
                                                                        <path d="M27.1428571,0 L27.1428571,20 L32.8571429,20 C32.8571429,20 34.2857143,20 35,18.5714286 C38.8571429,10.8571429 40,8.57142857 40,8.57142857 L40.7142857,8.57142857 L40.7142857,20 L47.1428571,20 L47.1428571,0 L41.4285714,0 C41.4285714,0 40,0.142857143 39.2857143,1.42857143 C36,8 34.2857143,11.4285714 34.2857143,11.4285714 L33.5714286,11.4285714 L33.5714286,0 L27.1428571,0 Z" id="path14"></path>
                                                                        <path d="M0,20 L0,0 L6.42857143,0 C6.42857143,0 8.28571429,0 9.28571429,2.85714286 C11.8571429,10.4285714 12.1428571,11.4285714 12.1428571,11.4285714 C12.1428571,11.4285714 12.7142857,9.57142857 15,2.85714286 C16,0 17.8571429,0 17.8571429,0 L24.2857143,0 L24.2857143,20 L17.8571429,20 L17.8571429,9.28571429 L17.1428571,9.28571429 L13.5714286,20 L10.7142857,20 L7.14285714,9.28571429 L6.42857143,9.28571429 L6.42857143,20 L0,20 Z" id="path16"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="card-ico visa"><img src="img/footer/f1-white.svg" alt=""></div>
                                        <div class="card-ico mastercard">
                                            <img src="img/footer/f2-white.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="card-front__middle">
                                        <div class="card-number-name">Номер карты</div>
                                        <div class="card-number">
                                            <input type="tel" id="bank-card-number" class="card-input ym-disable-keys" data-real-id="real-card-number" placeholder="0000   0000   0000   0000" data-mask="0000   0000   0000   0000000" autocomplete="off" maxlength="28">
                                        </div>
                                    </div>
                                    <div class="card-front__bottom">
                                        <div class="card-ico"><span class="icon-chip"></span></div>
                                        <div class="card-month-year">
                                            <span>ММ / ГГ</span>
                                            <input type="tel" class="card-input js-focus3 ym-disable-keys" placeholder="00/00" id="bank-card-expire-date" data-mask="00/00" autocomplete="off" maxlength="5">
                                        </div>
                                        <div class="card-cvc">
                                            <div class="card-cvc-name">CVC2</div>
                                            <div class="card-cvc-block">
                                                <input type="tel" id="small-cvv" class="card-input card-input_cvc ym-disable-keys" placeholder="_ _ _" data-mask="000" autocomplete="off" maxlength="3">
                                                <span>с обратной стороны карты</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="card-decor"></div>
                                    <div class="card-cvc-back">
                                        <div class="card-cvc-name">
                                            <span>CVC2</span>
                                        </div>
                                        <input type="tel" class="card-input card-input_cvc ym-disable-keys" id="big-cvv" placeholder="_ _ _" data-mask="000" autocomplete="off" maxlength="3">
                                    </div>
                                </div>
                            </div>
                            <div class="form__footer">
                                <a href="javascript:void(0)" data-href="#step-4" class="black btn-stepsBlack">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.125 5.62497H2.64394L5.50856 2.89647C5.65856 2.75359 5.66437 2.51622 5.5215 2.36622C5.37881 2.21641 5.14144 2.21041 4.99125 2.35328L1.71975 5.46953C1.57819 5.61128 1.5 5.79953 1.5 5.99997C1.5 6.20022 1.57819 6.38866 1.72631 6.53659L4.99144 9.64647C5.064 9.71566 5.157 9.74997 5.25 9.74997C5.349 9.74997 5.448 9.71097 5.52169 9.63353C5.66456 9.48353 5.65875 9.24634 5.50875 9.10347L2.63213 6.37497H10.125C10.332 6.37497 10.5 6.20697 10.5 5.99997C10.5 5.79297 10.332 5.62497 10.125 5.62497Z" fill="#828282"/>
                                    </svg>
                                    Назад
                                </a>
{{--                                <a class="button greyyy" href="offers.blade.php">У меня нет карты</a> --}}
                                <button id="btnCart" class="button" >Получить деньги</button>
                            </div>
                        </div>
                    </div> !-->
                </div>
            </div>
        </div>
    </section>
@endsection
