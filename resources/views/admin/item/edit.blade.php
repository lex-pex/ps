@extends('home')
@section('feed')
<div class="row">
    <div class="col-md-12">

        <h4>{{ $title . ' #id: ' . $item->id }}</h4>

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
                            <form method="post" action="{{ route( $type . 'Store', ['item' => $item]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input placeholder="Title" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $item->name }}" required autofocus>
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
                                            <img src="{{ $item->image ? $item->image : '/img/def/def.jpg' }}" width="100%" />
                                            <input class="btn btn-block btn-info" type="file" name="image" id="image">
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
                                        <textarea placeholder="Here is the description..." rows="3" id="text" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ old('description') ? old('description') : $item->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea placeholder="Here is the text..." rows="7" id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text">{{ old('text') ? old('text') : $item->text }}</textarea>
                                        @if ($errors->has('text'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('text') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input placeholder="alias" id="alias" type="text" class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}" name="alias" value="{{ old('alias') ? old('alias') : $item->alias }}" required autofocus>
                                        @if ($errors->has('alias'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('alias') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                @if($parents)
                                <div class="form-group row">
                                    <div class="col-12">
                                        <select id="rubric" class="form-control" name="parent_id">
                                            @foreach ($parents as $p)
                                                <option {!! $p->id == $item->getAttribute($parentType . '_id') ? 'selected="selected"' : '' !!} value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input placeholder="sort order" id="sort_order" type="text" class="form-control{{ $errors->has('sort_order') ? ' is-invalid' : '' }}" name="sort_order" value="{{ old('sort_order') ? old('sort_order') : $item->sort_order }}" required autofocus>
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
                                            <option @if ($item->status)) {!! 'selected="selected"' !!} @endif value="1">Shown</option>
                                            <option @if (!$item->status)) {!! 'selected="selected"' !!} @endif value="0">Hidden</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-2"><button class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('item-del-form').submit();">Delete</button></div>
                                    <div class="col-md-2 offset-md-8">
                                        <button type="submit" value="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <form id="item-del-form" action="{{ route($type . 'Del', ['item' => $item]) }}" method="post" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection