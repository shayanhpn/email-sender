<x-app>
    <x-navbar></x-navbar>
    <div class="container p-4">
        <div class="col-md-6">
            <form action="" class="p-4 bg-white shadow-sm" method="POST">
                @csrf
                <h4>تنظیمات ایمیل</h4>
                <hr>
                <select  class="form-select" name="mailer">
                    <option value="smtp">SMTP</option>
                </select>
                @error('mailer') <p class="text-danger">{{$message}}</p> @enderror
                <input type="text" class="form-control" placeholder="هاست" name="host" value="{{$setting->host}}">
                @error('host') <p class="text-danger">{{$message}}</p> @enderror
                <input type="text" class="form-control w-25" placeholder="پورت" name="port" value="{{$setting->port}}">
                @error('port') <p class="text-danger">{{$message}}</p> @enderror
                <input type="text" class="form-control" placeholder="نام کاربری" name="username" value="{{$setting->username}}" >
                @error('username') <p class="text-danger">{{$message}}</p> @enderror
                <input type="password" class="form-control" placeholder="رمز عبور" name="password" value="{{$setting->password}}">
                @error('password') <p class="text-danger">{{$message}}</p> @enderror
                <div class="d-flex flex-row justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
</x-app>
