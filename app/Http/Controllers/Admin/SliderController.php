<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request; 
use App\Models\Slider;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index ()
    {
        $sliders = Slider::all();
        return view('announcement.slider', compact('sliders'));
    }

    public function create ()
    {
        return view ('announcement.create');
        
    }

    public function store (SliderFormRequest $request)
    {
        $validatedData = $request -> validated();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time () .'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] ="uploads/slider/$filename";
        }
        $validatedData['status'] = $request->gc_status == true ? '1':'0';

        Slider::create([
            // 'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            // 'image' => $validatedData['image'],
            // 'status' => $validatedData['status'],
        ]);
        
        return redirect('sliders')->with('message', 'Slider Added Successfully');
    }

    public function edit(Slider $slider)
    {
        return view('announcement.edit', compact('slider'));
        
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {

        $validatedData = $request -> validated();

        if($request->hasFile('image')){

            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time () .'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] ="uploads/slider/$filename";
            
        }

        $validatedData['status'] = $request->gc_status == true ? '1':'0';

        Slider::where('id', $slider->id)->update([
            
            'description' => $validatedData['description'],
        ]);
        
        return redirect('sliders')->with('message', 'Slider Added Successfully');
    }

    public function destroy(slider $slider)
    {
        if($slider->count() > 0){
        $destination = $slider->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $slider->delete();
        return redirect('sliders')->with('message', 'Deleted Successfully');
    }
        return redirect('sliders')->with('message', 'Something went wrong');
    }
}
