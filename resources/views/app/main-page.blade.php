<x-app>
    <x-navbar></x-navbar>
    <div class="container p-4">
            <div class="col-md-6">
                <form action="" class="p-4 bg-white shadow-sm" method="POST">
                    @csrf
                    <h4>ارسال ایمیل</h4>
                    <hr>
                    <input type="text" class="form-control @error('to') is-invalid @enderror" placeholder="به" name="to">
                    @error('to') <p class="text-danger">{{$message}}</p> @enderror
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="عنوان" name="title">
                    @error('title') <p class="text-danger">{{$message}}</p> @enderror
                    <textarea type="text" cols="10" rows="10" class="form-control @error('body') is-invalid @enderror" placeholder="متن" name="body"></textarea>
                    @error('body') <p class="text-danger">{{$message}}</p> @enderror
                    <button type="submit" class="btn btn-primary btn-lg">ارسال پیام</button>
                </form>
            </div>
    </div>
</x-app>
