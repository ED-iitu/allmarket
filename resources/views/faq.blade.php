@extends('layouts.app')

@section('content')

    <style>
        .faq {
            margin-top: 30px;
            margin-bottom: 20px;
            width: 1048px;
            display: flex;
            justify-content: space-between;

            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 10px;

        }


        .faq-title {
            width: 909px;
            height: 17px;

            margin-top: 28px;
            margin-left: 20px;


            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 30px;

            display: flex;
            align-items: center;
            text-transform: uppercase;

            color: #637E99;
        }

        .btn {
            background: linear-gradient(0deg, #E3EDF7, #E3EDF7) !important;
            border: none;
            font-size: 50px;
            color: rgba(99, 126, 153, 0.2);

        }

        button.btn.collapsed:before
        {
            content:'+' ;
            display:block;
            width:20px;
            margin-top: -12px;
            margin-left: -32px;
        }

        .faq:before {
            width: 1049.55px;
            height: 65.75px;
            left: calc(50% - 1049.55px/2 + 0.79px);
            top: 289.33px;

            background: rgba(205, 223, 239, 0.85);
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.25);
            border-radius: 15px;
            transform: matrix(1, 0, 0, 1, 0, 0);
        }

        button.btn:before
        {
            content:'-' ;
            display:block;
            width:20px;
            margin-top: -12px;
            margin-left: -32px;
        }
        .btn:hover {
            color: rgba(99, 126, 153, 0.2);
        }

        .btn:focus {
            box-shadow: none !important;
        }

        .faq-text-div {
            margin-top: 20px;
            width: 1047px;


            border: 2px solid #FFFFFF;
            box-sizing: border-box;
            border-radius: 10px;
        }

        .faq-text {
            width: 973px;

            margin-top: 20px;
            margin-left: 20px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 25px;
            line-height: 30px;
            display: flex;
            align-items: center;

            color: #43637A;
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
        <div class="bread">Главная / F.A.Q</div>
    </div>

    <div class="container" style="margin-top: 30px">
            <div class="faq">
                <div class="faq-title">Доставка</div>
                <button class="btn collapsed" data-toggle="collapse" data-target="#dostavka"></button>
            </div>

            <div id="dostavka" class="collapse faq-text-div">
                <p class="faq-text">
                    Минимальная сумма заказа 5 000 тенге; <br><br>

                    • Наша служба доставки работает с 10.00 до 00.00;<br>
                    • При оформлении и подтверждении заказа доставка <br>
                    осуществляется на следующий день. <br><br>

                    Перед оформлением заказа обязательно проверьте, входит ли Ваш адрес
                    в Зону доставки. Зону доставки можете уточнить у наших операторов.
                </p>

            </div>

        <div class="faq">
            <div class="faq-title">КАК СДЕЛАТЬ ЗАКАЗ?</div>
            <button class="btn collapsed" data-toggle="collapse" data-target="#order"></button>
        </div>
        <div id="order" class="collapse faq-text-div">
            <p class="faq-text">
                Через меню навигации по категориям, выберите необходимый товар и нажмите добавить в корзину. <br><br>
                На главной странице можно добавить в корзину предложенные акционные предложения.
                Также можно воспользоваться поиском. Затем перейдите в корзину и нажмите «Оформить заказ»
            </p>

        </div>
        <div class="faq">
            <div class="faq-title">Я ОФОРМИЛ(-А) ЗАКАЗ, ЧТО ПОТОМ?</div>
            <button class="btn collapsed" data-toggle="collapse" data-target="#order_after"></button>
        </div>

        <div id="order_after" class="collapse faq-text-div">
            <p class="faq-text">
                В ближайшее время с Вами свяжется оператор для подтверждения заказа и обсуждения деталей доставки.
            </p>

        </div>

        <div class="faq">
            <div class="faq-title">КАК ПРОИСХОДИТ ОПЛАТА ЗАКАЗА?</div>
            <button class="btn collapsed" data-toggle="collapse" data-target="#checkout"></button>
        </div>

        <div id="checkout" class="collapse faq-text-div">
            <p class="faq-text">
                Оплатить можно тремя способами: <br>
                o Наличными, при получении заказ <br>
                o Картой, при получении заказ <br>
                o Картой онлайн (предоплата)
            </p>

        </div>


        <div class="faq">
            <div class="faq-title">Хочу изменить заказ, Как это сделать?</div>
            <button class="btn collapsed" data-toggle="collapse" data-target="#change_order"></button>
        </div>

        <div id="change_order" class="collapse faq-text-div">
            <p class="faq-text">
                Вы можете связаться с нами по номерам, указанным выше. Оператор подкорректирует Ваш заказ.
            </p>

        </div>

        <div class="faq">
            <div class="faq-title">У меня есть промокод. как им пользоваться?
            </div>
            <button class="btn collapsed" data-toggle="collapse" data-target="#promocode"></button>
        </div>

        <div id="promocode" class="collapse faq-text-div">
            <p class="faq-text">
                При использовании промокода вы получаете кэшбэк (размер кэшбэка определяется типом промокода)
                в виде бонусов на баланс мобильного приложения. Накопленными бонусами можно будет оплачивать
                последующие заказы (как частично, так и полностью).
                <br><br>

                Промокод является одноразовым. Клиент может воспользоваться им только один раз.
                Бонусы начисляются только за выполненные заказы. Если заказ отменён, то бонусы не будут начислены.

            </p>

        </div>

        <div class="faq">
            <div class="faq-title">Возможен возврат или обмен товара?</div>
            <button class="btn collapsed" data-toggle="collapse" data-target="#vozvrat"></button>
        </div>

        <div id="vozvrat" class="collapse faq-text-div">
            <p class="faq-text">
                Мы соблюдаем действующее законодательство РК и закон «О защите прав потребителей».
                Вы можете вернуть (обменять) нам товар в течение 14 дней со дня покупки, если товар не был в
                употреблении, сохранен товарный вид, потребительские свойства, пломбы, ярлыки.

            </p>

        </div>

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