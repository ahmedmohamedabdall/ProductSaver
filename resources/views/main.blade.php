@extends('layout.layout')
@section('content')
    <!--
            to create a list
            1-ul =>  list-group

            2- li =>list-group-item

            3- to give the back grount of the
            li a color => list-group-item- the color
        -->




    <section id="main">
        <div class="container p-2 mt-1">
            <div class="row  d-flex d-inline d-table-row">

                <!--
            to creat a badge
            
            span=> badge bg-secondry

            and float-end => place it at the right end

            float-start => place it at left end
        -->

                {{-- side par --}}



                


    

                    {{-- table posetion --}}
                    @include('share.table', ['product' => $product])




        </div>

    </section>


@endsection
