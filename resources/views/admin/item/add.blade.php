@extends('home')
@section('feed')
    <div class="row">
        <div class="col-md-12">

            <h4>{{ $title }}</h4>

            <table class="table table-responsive-md">
                <tr>
                    <td style="text-transform:capitalize">
                        @foreach($path as $name => $link)<a href="/{{ $link }}">{{ $name }}</a> | @endforeach
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ route( 'itemSave', ['item' => $type]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input placeholder="Title" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-control-file">
                                                <img src="/img/def/def.jpg" width="100%" />
                                                <input class="btn btn-block btn-info" type="file" name="image" id="image" value="{{ old('image') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="del_img" id="del_img" {{ old('del_img') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="del_img">Delete image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <textarea placeholder="Here is the description..." rows="3" id="text" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <textarea placeholder="Here is the text..." rows="7" id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text">{{ old('text') }}</textarea>
                                            @if ($errors->has('text'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('text') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input placeholder="alias" id="alias" type="text" class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}" name="alias" value="{{ old('alias') }}" required autofocus>
                                            @if ($errors->has('alias'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('alias') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    @if($parent)
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <select id="rubric" class="form-control" name="parent_id">
                                                @foreach ($parent as $item)
                                                    <option {!! $item->id == 1 ? 'selected="selected"' : '' !!} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input placeholder="sort order" id="sort_order" type="text" class="form-control{{ $errors->has('sort_order') ? ' is-invalid' : '' }}" name="sort_order" value="{{ old('sort_order') ? old('sort_order') : '0' }}" required autofocus>
                                            @if ($errors->has('sort_order'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sort_order') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <select id="displayStatus" class="form-control" name="status" >
                                                <option selected="selected" value="0">Hidden</option>
                                                <option value="1">Shown</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-2"><button class="btn btn-danger">Delete</button></div>
                                        <div class="col-md-2 offset-md-8">
                                            <button type="submit" value="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection