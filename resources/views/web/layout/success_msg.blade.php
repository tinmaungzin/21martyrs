<style>
.alertBox{
    position: fixed; 
    right:28%;
     bottom: 2%;
     z-index: 100;
     width: 45%;
     background:#8dffb0;
}
.alertBox button{
    outline: none;
}
.checkArea{
    display: flex;
    justify-content: center;
}
.checkArea img{
    width: 5%;
    padding-bottom: 7px;
}
.checkArea p{
    padding-left: 20px;
    line-height: 30px;
}

@media (max-width: 1200px) {
    .checkArea img{
    width: 8%;
    padding-bottom: 7px;
}
}

@media (max-width: 900px) {
  .alertBox{
    width: 60%;
    right: 22%;
}
}

@media (max-width: 600px) {
  .alertBox{
    width: 80%;
    right: 10%;
}
}
@media (max-width: 450px) {
  .alertBox{
    width: 100%;
    right: 0%;
}
}
</style>




{{-- @if(Session::has('msg')) --}}
    <div class="alert alert-info alertBox role="alert" ">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="checkArea">
            <img  src="{{asset('web/img/icons8-checkmark.svg')}}" alt="">
           <p> Thank you for submmiting! We will review and upload it as soon as possible. Stay Safe!</p>
        </div>
        {{-- {{Session::get('msg')}} --}}
    </div>
{{-- @endif --}}

