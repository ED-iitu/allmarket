@extends('layouts.app')

@section('content')

    <style>
        .faq-title {
            text-transform: uppercase;
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 30px;


            color: #637E99;
        }

        .uk-accordion-title::before {
            font-size: 30px ;
            background-image: url("/images/plus.png");
        }
        .uk-open>.uk-accordion-title::before {
            font-size: 30px ;
            background-image: url("/images/minus.png");
        }

        .uk-open>.faq {
            background: rgba(205, 223, 239, 0.85);
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.25);
            border-radius: 15px;
        }


        .faq {
            padding: 10px;
            height: 66px;
            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 15px;

        }

        .faq-text {
            padding: 25px;
            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 25px;
            line-height: 30px;
            display: flex;
            align-items: center;

            color: #43637A;
        }

        .faq-text-div {
            border: 3px solid #C9DBEF;
            box-sizing: border-box;
            border-radius: 11px;
        }


        .line1 {
            margin-top: 40px;
            width: 320px;
            height: 3px;


            background: #FFFFFF;
            border-radius: 0px 0px 1px 1px;
        }

        .line2 {
            width: 320px;
            height: 3px;
            margin-top: -5px;

            background: #C9DBEF;
            border-radius: 1px 1px 0px 0px;
        }
        .supp_num {

            margin-bottom: 30px;

            width: 640px;
            height: 37px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 30px;
            line-height: 37px;
            /* identical to box height */

            display: flex;
            align-items: center;
            text-align: center;
            text-transform: uppercase;

            color: #015442;

            text-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px #8FACC1
        }
    </style>
    <div class="container">
        <div class="bread"><a class="bredLink" href="{{route('home')}}">Главная</a>/ F.A.Q</div>
    </div>

    <div class="container" style="margin-top: 30px">

        <ul uk-accordion="multiple: true">
            <li>
                <a class="uk-accordion-title faq" href="#">
                    <span class="faq-title">Доставка</span>
                </a>
                <div class="uk-accordion-content faq-text-div">
                    <p class="faq-text">
                        Минимальная сумма заказа 5 000 тенге; <br><br>

                        • Наша служба доставки работает с 10.00 до 00.00;<br>
                        • При оформлении и подтверждении заказа доставка <br>
                        осуществляется на следующий день. <br><br>

                        Перед оформлением заказа обязательно проверьте, входит ли Ваш адрес
                        в Зону доставки. Зону доставки можете уточнить у наших операторов.
                    </p>
                </div>
            </li>

            <li>
                <a class="uk-accordion-title faq" href="#">
                    <span class="faq-title">КАК СДЕЛАТЬ ЗАКАЗ?</span>
                </a>
                <div class="uk-accordion-content faq-text-div">
                    <p class="faq-text">
                        Через меню навигации по категориям, выберите необходимый товар и нажмите добавить в корзину. <br><br>
                        На главной странице можно добавить в корзину предложенные акционные предложения.
                        Также можно воспользоваться поиском. Затем перейдите в корзину и нажмите «Оформить заказ»
                    </p>
                </div>
            </li>

            <li>
                <a class="uk-accordion-title faq" href="#">
                    <span class="faq-title">Я ОФОРМИЛ(-А) ЗАКАЗ, ЧТО ПОТОМ?</span>
                </a>
                <div class="uk-accordion-content faq-text-div">
                    <p class="faq-text">
                        В ближайшее время с Вами свяжется оператор для подтверждения заказа и обсуждения деталей доставки.
                    </p>
                </div>
            </li>

            <li>
                <a class="uk-accordion-title faq" href="#">
                    <span class="faq-title">КАК ПРОИСХОДИТ ОПЛАТА ЗАКАЗА?</span>
                </a>
                <div class="uk-accordion-content faq-text-div">
                    <p class="faq-text">
                        Оплатить можно тремя способами: <br>
                        o Наличными, при получении заказ <br>
                        o Картой, при получении заказ <br>
                        o Картой онлайн (предоплата)
                    </p>
                </div>
            </li>

            <li>
                <a class="uk-accordion-title faq faq-mobile" href="#">
                    <span class="faq-title">Хочу изменить заказ, Как это сделать?</span>
                </a>
                <div class="uk-accordion-content faq-text-div">
                    <p class="faq-text">
                        Вы можете связаться с нами по номерам, указанным выше. Оператор подкорректирует Ваш заказ.
                    </p>
                </div>
            </li>

            <li>
                <a class="uk-accordion-title faq faq-mobile" href="#">
                    <span class="faq-title">У меня есть промокод. как им пользоваться?</span>
                </a>
                <div class="uk-accordion-content faq-text-div">
                    <p class="faq-text">
                        При использовании промокода вы получаете кэшбэк (размер кэшбэка определяется типом промокода)
                        в виде бонусов на баланс мобильного приложения. Накопленными бонусами можно будет оплачивать
                        последующие заказы (как частично, так и полностью).
                        <br><br>

                        Промокод является одноразовым. Клиент может воспользоваться им только один раз.
                        Бонусы начисляются только за выполненные заказы. Если заказ отменён, то бонусы не будут начислены.
                    </p>
                </div>
            </li>

            <li>
                <a class="uk-accordion-title faq faq-mobile" href="#">
                    <span class="faq-title">Возможен возврат или обмен товара?</span>
                </a>
                <div class="uk-accordion-content faq-text-div">
                    <p class="faq-text">
                        Мы соблюдаем действующее законодательство РК и закон «О защите прав потребителей».
                        Вы можете вернуть (обменять) нам товар в течение 14 дней со дня покупки, если товар не был в
                        употреблении, сохранен товарный вид, потребительские свойства, пломбы, ярлыки.
                    </p>
                </div>
            </li>
        </ul>


        <div class="d-flex justify-content-center">
            <div class="line1"></div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="line2"></div>
        </div>

        <div class="d-flex justify-content-center" style="margin-top: 30px">
            <div class="supp_num">телефон поддержки: <span style="margin-left: 15px"> <a href="tel:+7 747 657 47 12" style="color: #015442; font-weight: 900">+7 747 657 47 12</a></span> </div>
        </div>

    </div>
@endsection