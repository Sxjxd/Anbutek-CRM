<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold leading-tight">
            Customer Feedback
        </h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Message
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($feedback as $feedbackItem)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    {{ $feedbackItem->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    {{ $feedbackItem->category }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    {{ $feedbackItem->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    {{ $feedbackItem->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    {{ $feedbackItem->message }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        <span id="status{{ $feedbackItem->id }}">{{ $feedbackItem->status }}</span>
                                        @if ($feedbackItem->status === 'resolved')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 0a10 10 0 110 20 10 10 0 010-20zm4.293 7.293a1 1 0 00-1.414-1.414L9 12.586l-2.879-2.88a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l6-6z"/>
                                            </svg>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex space-x-2">
                                        <button onclick="editStatus({{ $feedbackItem->id }})" class="bg-blue-500 text-white px-2 py-1 rounded">
                                            Edit Status
                                        </button>
                                        <button onclick="deleteFeedback({{ $feedbackItem->id }})" class="bg-red-500 text-white px-3 py-1 rounded">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function editStatus(feedbackId) {
            const newStatus = prompt('Edit Status (pending/resolved):', document.getElementById(`status${feedbackId}`).innerText);
            if (newStatus && (newStatus === 'pending' || newStatus === 'resolved')) {
                axios.put(`/api/feedback/${feedbackId}/status`, { status: newStatus })
                    .then(response => {
                        alert(response.data.message);
                        location.reload(); // Reload the page after status change
                    })
                    .catch(error => {
                        alert('Status update failed');
                    });
            } else {
                alert('Invalid status. Please enter "pending" or "resolved".');
            }
        }

        function deleteFeedback(feedbackId) {
            if (confirm('Are you sure you want to delete this feedback?')) {
                axios.delete(`/api/feedback/${feedbackId}`)
                    .then(response => {
                        alert(response.data.message);
                        location.reload(); // Reload the page after deletion
                    })
                    .catch(error => {
                        alert('Deletion failed');
                    });
            }
        }
    </script>
</x-app-layout>
