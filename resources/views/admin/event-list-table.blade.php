@forelse ($events as $index => $event)
<tr class="border-b">
    <td class="px-4 py-4">{{ $loop->iteration + ($events->currentPage() - 1) * $events->perPage() }}</td>
    <td class="px-4 py-4">{{ $event->event_name }}</td>
    <td class="px-4 py-4">
        @if ($event->banner)
        <img 
            src="{{ asset('storage/' . $event->banner) }}" 
            alt="Event Banner" 
            class="w-32 h-auto rounded-md cursor-pointer" 
            onclick="openModal('{{ asset('storage/' . $event->banner) }}')">
        @else
        <span class="text-gray-500">No Banner</span>
        @endif
    </td>
    <td class="px-4 py-4">{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</td>
    <td class="px-4 py-4">
        @if ($event->event_status === 'running')
            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                Running
            </span>
        @elseif ($event->event_status === 'draft')
            <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                Draft
            </span>
        @elseif ($event->event_status === 'ended')
            <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                Ended
            </span>
        @else
            <span class="inline-flex items-center bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <span class="w-2 h-2 me-1 bg-gray-500 rounded-full"></span>
                Unknown
            </span>
        @endif
    </td>
    
    <td class="px-4 py-4 flex space-x-2">
        <a href="/admin/event-record/report/{{ $event->event_id }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">Report</a>
        <a href="/admin/event-record/update/{{ $event->event_id }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-md">Update</a>
        <form action="{{ route('event.record.delete', $event->event_id) }}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">Delete</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-gray-500">No events found.</td>
</tr>
@endforelse