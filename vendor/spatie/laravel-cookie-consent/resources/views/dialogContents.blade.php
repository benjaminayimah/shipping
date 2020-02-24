<div class="js-cookie-consent cookie-consent">

    <span class="cookie-consent__message">
        {!! trans('cookieConsent::texts.message') !!}
    </span>
    <a href="{{ route('get.privacy') }}" class="cookie-consent-link">{!! trans('cookieConsent::texts.link') !!}</a>
    <button class="js-cookie-consent-agree cookie-consent__agree">
        <i class="zmdi zmdi-check"></i> {{ trans('cookieConsent::texts.agree') }}
    </button>

</div>
