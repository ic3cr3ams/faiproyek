@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
      <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3>Chat Room</h3>
            </div>
            @if (Session::get('id')=='')
                <h1>Pilih Customer</h1>
            @elseif(Session::get('ctr')=='0' &&Session::get('id')!='')
                <h1>Tidak ada pesan dengan {{Session::get('nama')}}</h1>
            @else
                @foreach (Session::get('isi') as $item=>$value)
                    <div class="group-rom">
                        <div class="first-part">{{$value->pengirim}}</div>
                        <div class="second-part">{{$value->isi}}</div>
                    </div>
                @endforeach
            @endif
            {{-- KIRIM PESAN DI SINI --}}
            <form action="send" method="POST">
                @csrf
                    <div class="chat-txt">
                      <input type="text" class="form-control" name="pesan">
                    </div>
                    <button class="btn btn-theme" type="submit">Send</button>
            </form>
          </aside>
          <aside class="right-side">
            <div class="invite-row">
              <h4 class="pull-left">Chat Customer</h4>
            </div>
            <ul class="chat-available-user">
                @php
                    $user = DB::table('users')->get()
                @endphp
                @foreach ($user as $item=> $value)
                    <form action="pilihcustomer" method="post">
                        @csrf
                    <li>
                        <input type="hidden" name="id" value= "{{$value->id}}">
                        <input type="hidden" name="nama" value= "&nbsp;{{$value->nama}}">
                        <button type="submit" >{{$value->nama}}</button>
                    </li>
                    </form>
                @endforeach
            </ul>
          </aside>
        </div>
        <!-- page end-->
      </section>
      <!-- /wrapper -->
    </section>
    @endsection
