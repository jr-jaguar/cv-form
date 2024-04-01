@extends('./base')

@section('title', 'Contact Us')

@section('content')
    <button id="openModal">Open Modal</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Надіслати резюме</h2>

            <form id="contactForm" method="POST" action="/contact" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="text" name="name" placeholder="Ім'я та Прізвище" value="{{ old('name') }}" required>
                <input type="email" name="email" placeholder="Ваш Email" {{ old('email') }} required>
                <input type="tel" name="phone" id="phone" placeholder="Ваш номер телефону" value="{{ old('phone') }}"
                       required>
                <input type="text" name="vacancy" id="vacancy" placeholder="Назва вакансії" value="{{ old('phone') }}"
                       required>
                <textarea name="message" placeholder="Супровідний лист" maxlength="500"></textarea>
                <input type="checkbox" name="agree"> I agree to the terms
                <div class="form-bottom">
                    <label for="resume" class="file-upload">
                        <span class="upload-icon"><img src="{{asset('dist/images/Attach.png')}}" alt="attachment"></span>
                        <span>Додати резюме</span>
                    </label>
                    <input type="file" name="file" id="resume" style="display: none;">
                    <button id="submitBtn" type="submit">Надіслати</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/css/app.css',
            'resources/js/app.js',
            'resources/js/contact.js',
            'resources/sass/app.scss',])
@endsection

@section('head_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
@endsection

@section('head_styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">

@endsection
