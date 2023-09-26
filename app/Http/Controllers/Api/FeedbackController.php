<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        try {
            $request->validate([
                'category' => 'required|in:complaint,inquiry,feedback,other',
                'name' => 'nullable|string',
                'email' => 'required|email',
                'message' => 'required|string',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Invalid data',
                'errors' => $th->getMessage()
            ], 422);
        }

        // Create a new feedback record
        $feedback = new Feedback();
        $feedback->category = $request->input('category');
        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->message = $request->input('message');
        $feedback->save();

        // You can also perform additional actions here, like sending notifications or emails

        // Return a success response
        return response()->json(['message' => 'Feedback submitted successfully'], 201);
    }

    public function getFeedback()
    {
        $feedback = Feedback::all();
        return view('admin.customerFeedback', compact('feedback'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->update([
                'status' => $request->input('status'),
            ]);

            return response()->json(['message' => 'Status updated successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Feedback not found'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();

            return response()->json(['message' => 'Feedback deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Feedback not found'], 404);
        }
    }




}
