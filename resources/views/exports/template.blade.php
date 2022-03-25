<table>
    <thead>
    <tr>
        <th>Matric No</th>
        <th>Course Title</th>
        <th>Course Code</th>
        <th>Session</th>
        <th>Semester</th>
        <th>Unit Load</th>
        <th>Level</th>
        <th>Exam Score</th>
        <th>CA Score</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($registered_courses as $registered)
    <tr>
        <td>{{ $registered->student->matric_no }}</td>
        <td>{{ ucwords($registered->course->course_title) }}</td>
        <td>{{ strtoupper($registered->course->course_code) }}</td>
        <td>{{ $registered->session }}</td>
        <td>{{ $registered->course->semester }}</td>
        <td>{{ $registered->course->unit_load }}</td>
        <td>{{ strtoupper($registered->course->level) }}</td>
        <td>0</td>
        <td>0</td>
    </tr>
    @endforeach
    </tbody>
</table>