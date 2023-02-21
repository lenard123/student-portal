<div class="bg-white">
    <div class="p-4">
        <h4>Enrolled Students</h4>
    </div>

    <fb-table>
        <table-head>
            <table-head-cell>
                Name
            </table-head-cell>
        </table-head>
        <table-body>
            @if ($course->section->students->isEmpty())
            <table-row>
                <table-cell>No student enrolled in this section</table-cell>
            </table-row>
            @else
            @foreach($course->section->students as $student)
            <table-row>
                <table-cell>
                    <div class="text-left">{{ $student->user->fullname }}</div>
                </table-cell>
            </table-row>
            @endforeach
            @endif
        </table-body>
    </fb-table>

</div>