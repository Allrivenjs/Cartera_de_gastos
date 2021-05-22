<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

{{$errros=''}}
@foreach($errors->all() as $erros)
    <a href="#" hidden> {{$errros = $errros .' '. $erros}} </a>
@endforeach

    <script>
        Swal.fire(
            {
                icon: 'error',
                title: 'Oops...',
                text: '{{$errros}}'
                ,
            }
        )
    </script>
