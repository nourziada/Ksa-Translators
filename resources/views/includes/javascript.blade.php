<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/parsley.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script src="{{url('/')}}/js/fileinput_{{LaravelLocalization::getCurrentLocale()}}.min.js"></script>
<script src="{{url('/')}}/js/main_{{LaravelLocalization::getCurrentLocale()}}.js"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
    <script type="text/javascript">

        @if(Session::has('success-toastr'))
            toastr.success('{{ Session::get('success-toastr') }}')
        @endif

        @if(Session::has('error-toastr'))
            toastr.error('{{ Session::get('error-toastr') }}')
        @endif
        
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#popUpModel').modal('toggle');
        }); 
    </script>



@if(Session::has('infoData'))
<div id="popUpModel" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content modl-c">
                <div class="modal-header" style="background: #0760ad;">
                    <button type="button" class="close close-butn" data-dismiss="modal" aria-hidden="true" style="display: none;">&times;</button>
                    <h4 class="modal-title" style="color: #fff;font-size: 22px;">{{trans('main.note_that')}} !</h4>
                </div>
                <div class="modal-body" id="group-content">
                    <h4 class="modal-title" style="font-size: 18px;">{{ Session::get('infoData') }}</h4>
                </div>
                
                <div class="modal-footer mf">
                    <button style="background: #0760ad !important;" type="button" class="btn btn-info" data-dismiss="modal">Ok</button >
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
     </div>
@endif

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/standalone/selectize.js')}}"></script>
<script src="{{asset('js/standalone/selectize.min.js')}}"></script>

<script type="text/javascript">



$("#input-draggable").selectize({
  maxItems: null,
  create: function(input) {
        return {
            value: input,
            text: input
        }
    },
  onChange: function(value) {
    console.log(value);
  },
  render: {
    option_create: function(data, escape) {
      return '<div class="create">Pridat <strong>' + escape(data.input) + '</strong>&hellip;</div>'
    }
  }
});



$("#mulit_lang2").selectize({
  maxItems: null,
  create: function(input) {
        return {
            value: input,
            text: input
        }
    },
  onChange: function(value) {
    console.log(value);
  },
  render: {
    option_create: function(data, escape) {
      return '<div class="create">Pridat <strong>' + escape(data.input) + '</strong>&hellip;</div>'
    }
  }
});
</script>


<script type="text/javascript">
  $('.file-default-preview').click(function(e) {  
    $(".fileinput-remove span").text("X حذف");
    $(".fileinput-remove span").addClass("span-delete");
  });
  
</script>

