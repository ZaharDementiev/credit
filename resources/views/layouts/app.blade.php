<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Займ на карту прямо сейчас</title>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jquery.formstyler.css">
    <link rel="stylesheet" href="css/jquery.formstyler.theme.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    @if(Request::is('/unNewsletters'))
        <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    @elseif(Request::is('/offers'))
        <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    @elseif(Request::is('/loan'))
        <link rel="stylesheet" href="css/jquery.formstyler.css">
        <link rel="stylesheet" href="css/jquery.formstyler.theme.css">
        <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    @elseif(Request::is('/callBack'))
        <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    @elseif(Request::is('/unSubscribe'))
        <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    @endif
</head>
<body class=" nomain">
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header__row">
                <div class="header__logo">
                    <a href="{{route('index')}}" class="header__img">
                        <div class="icon icon_mob">
                            <svg width="29" height="20" viewBox="0 0 29 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.9286 20H2.07143C0.926984 20 0 19.105 0 18V2C0 0.89502 0.926984 0 2.07143 0H26.9286C28.073 0 29 0.89502 29 2V18C29 19.105 28.073 20 26.9286 20Z"
                                    fill="white" />
                                <path d="M0 5H29V9H0V5Z" fill="#2F77D5" />
                                <path d="M3.83105 14.1948H6.97717V16.2922H3.83105V14.1948Z" fill="#2F77D5" />
                                <path d="M9.07422 14.1948H13.269V16.2922H9.07422V14.1948Z" fill="#2F77D5" />
                                <path d="M15.3672 14.1948H19.562V16.2922H15.3672V14.1948Z" fill="#2F77D5" />
                                <path d="M21.6592 14.1948H24.8053V16.2922H21.6592V14.1948Z" fill="#2F77D5" />
                            </svg>
                        </div>
                        <div class="icon icon_desc">
                            <svg width="35" height="26" viewBox="0 0 35 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32.5 25.082H2.5C1.11877 25.082 0 23.9633 0 22.582V2.58203C0 1.20081 1.11877 0.0820312 2.5 0.0820312H32.5C33.8812 0.0820312 35 1.20081 35 2.58203V22.582C35 23.9633 33.8812 25.082 32.5 25.082Z"
                                    fill="#CACACA" />
                                <path
                                    d="M32.5 25.082H2.5C1.11877 25.082 0 23.9633 0 22.582V2.58203C0 1.20081 1.11877 0.0820312 2.5 0.0820312H32.5C33.8812 0.0820312 35 1.20081 35 2.58203V22.582C35 23.9633 33.8812 25.082 32.5 25.082Z"
                                    fill="url(#paint0_linear)" />
                                <path d="M0 6.33203H35V11.332H0V6.33203Z" fill="#B6B6B6" />
                                <path d="M5 17.582H8.75V20.082H5V17.582Z" fill="white" />
                                <path d="M11.25 17.582H16.25V20.082H11.25V17.582Z" fill="white" />
                                <path d="M18.75 17.582H23.75V20.082H18.75V17.582Z" fill="white" />
                                <path d="M26.25 17.582H30V20.082H26.25V17.582Z" fill="white" />
                                <defs>
                                    <linearGradient id="paint0_linear" x1="35" y1="0.0820283" x2="-1.27724e-07" y2="25.082"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#2668ED" />
                                        <stop offset="1" stop-color="white" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="text">
                            <span class="white">Заем на карту</span>
                            <span class="black">Деньги здесь и сейчас</span>
                        </div>
                    </a>
                </div>
                @if(Request::url() != 'http://www.zaemnakarty/loan')
                    <div class="header__menu menu">
                        <nav class="menu__body">
                            <ul class="menu__list">
                                <li><a href="" class="menu__link">Связаться с нами</a></li>
                                <li><a href="https://t.me/zaemnakartunow" class="menu__phone">
                                        Telegram
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.5 15C11.6421 15 15 11.6421 15 7.5C15 3.35786 11.6421 0 7.5 0C3.35786 0 0 3.35786 0 7.5C0 11.6421 3.35786 15 7.5 15Z"
                                                fill="url(#paint0s_linear)"/>
                                            <path
                                                d="M6.12494 10.9375C5.88194 10.9375 5.92325 10.8458 5.83944 10.6144L5.12494 8.26294L10.6249 5"
                                                fill="#C8DAEA"/>
                                            <path
                                                d="M6.12506 10.9375C6.31256 10.9375 6.39537 10.8517 6.50006 10.75L7.50006 9.77758L6.25269 9.02539"
                                                fill="#A9C9DD"/>
                                            <path
                                                d="M6.25313 9.02561L9.27563 11.2587C9.62056 11.449 9.86944 11.3504 9.95538 10.9385L11.1857 5.14079C11.3116 4.63579 10.9932 4.40667 10.6632 4.55648L3.43882 7.34217C2.94569 7.53998 2.94863 7.81511 3.34894 7.93767L5.20288 8.51636L9.49494 5.80854C9.69757 5.68567 9.88357 5.75167 9.73094 5.88717"
                                                fill="url(#paint1s_linear)"/>
                                            <defs>
                                                <linearGradient id="paint0s_linear" x1="10.005" y1="2.505" x2="6.255"
                                                                y2="11.25" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#37AEE2"/>
                                                    <stop offset="1" stop-color="#1E96C8"/>
                                                </linearGradient>
                                                <linearGradient id="paint1s_linear" x1="8.44087" y1="7.50058"
                                                                x2="9.61134" y2="10.1674"
                                                                gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#EFF7FC"/>
                                                    <stop offset="1" stop-color="white"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </header>            <!-- main -->
    @yield('content')
    <footer class="footer nomain">
        <div class="container container_bottom">
            <div class="footer__bottom bottom">
                <div class="bottom__body">
                    <h1>
                        ВАЖНО: предоплату за выдачу займа берут только мошенники!
                    </h1>
                    <p>
                        Компания ООО”ПИЛОТ” предоставляет услугу платного подбора займов - “zaemnakarty”. ООО “ПИЛОТ” ОГРН 1200200054900, ИНН/КПП 0272917001/027201001, г УФА, ул.
                        ТАЛЛИНСКАЯ, д.22А, помещение 18А. <br><br> Компания ООО “ПИЛОТ” является оператором персональных данных. Выдача займов у партнеров осуществляется в российских
                        рублях, на банковский счет, наличными или на карту, гражданам Российской Федерации. <br><br> Сервис не относится к финансовым учреждениям, не является кредитором или банком и не
                        несет ответственности за заключенные впоследствие клиентами и партнерами договоры кредитования. Доступные суммы займов: от 1 000 рублей до 60 000 рублей. <br><br> Срок займа:
                        от 1 до 365 дней включительно, при процентной ставке от 0% до 657%. <br><br> А так же
                        совершая любые действия на сайте, <a href="pdf/terms_of_the_public_offer_agreement.pdf" target="_blank">Вы принимаете условия договора публичной оферты</a>, <a href="pdf/personal_data_processing_policy.pdf" target="_blank">политику обработки персональных данных</a>, ознакомлены с <a href="pdf/application-service_rates.pdf" target="_blank">приложением, тарифами сервиса</a>, а
                        так же даете согласие <a href="pdf/to_receive_promotional_materials.pdf" target="_blank">на получение рекламных материалов</a> и <a href="pdf/for_the_processing_of_personal_data.pdf" target="_blank">на обработку персональных данных</a>. <br><br>
                        Режим работы службы поддержки: 10:00 - 19:00, без выходных. По всем интересующим вопросам Вы можете обратится через <a href="call_back.html">форму обратной связи</a>, e-mail службы поддержки сервиса
                        <a href="mailto:support@zaemnakarty.ru" target="_blank">support@zaemnakarty.ru</a> или в телеграм <a href="https://t.me/zaemnakartunow" target="_blank">@zaemnakartunow</a> <br><br>
                        Стоимость услуги - 398 (триста девяносто восемь) рублей. Стоимость платной подписки - 398 (триста девяносто восемь) рублей каждые пять дней. Наличие платной подписки не
                        гарантирует Вам получение займа. Клиент может отказаться от платной услуги подбора займов самостоятельно, в любое время - <a href="{{route('unSubscribe')}}">Отменить подписку</a>.
                    </p>
                    <div class="bottom__row">
                        <div class="bottom__column">
                            <div class="bottom__item">
                                <p>
                                    ООО “ПИЛОТ”, г. УФА.  <br> ул. ТАЛЛИНСКАЯ, д.22А, помещение 18А , 450050.
                                </p>
                                <p class="botm">
                                    <a href="https://t.me/zaemnakartunow">Telegram</a>
                                    <a href="mailto:support@zaemnakarty.ru">support@zaemnakarty.ru</a>
                                </p>
                            </div>
                        </div>
                        <div class="bottom__column buttons">
                            <div class="bottom__item">
                                <a href="{{route('callBack')}}" class="bottom__btn">Обратный звонок</a>
                                <a href="{{route('unNewsletters')}}" class="bottom__btn">Отписаться от SMS рассылки</a>
                            </div>
                        </div>
                        <div class="bottom__column icons">
                            <div class="bottom__item">
                                <div class="bottom__img">
                                    <img src="img/footer/f1-white.svg" alt="" />
                                    <img src="img/footer/f2-white.svg" alt="" />
                                    <img src="img/footer/f3-white.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom__end">
                        <ul class="bottom__list">
                            <li><a href="" class="bottom__link">©2021 Zaemnakarty</a></li>
                            <li><a href="pdf/personal_data_processing_policy.pdf" class="bottom__link" target="_blank">Согласие на обработку персональных данных</a></li>
                            <li><a href="pdf/to_receive_promotional_materials.pdf" class="bottom__link" target="_blank">Согласие на получение рекламных материалов</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/jquery.maskedinput.min.js" ></script>
<script src="js/jquery.formstyler.min.js"></script>
<script src="js/vendors.js"></script>
<script src="js/main.js"></script>
<script src="js/custom.js"></script>
<script src="js/slick.min.js"></script>
</body>
</html>
