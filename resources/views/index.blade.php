<html>
<head>
<link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/10.0.0/css/fabric.min.css" />
</head>
    <body class="ms-Fabric" >
    <span class="ms-font-su ms-fontColor-themePrimary">List of medical cases</span>
        <table>
        <thead>
          <tr>
              <th>id</th>
              <th>Status</th>
              <th>Creation date</th>
          </tr>
        </thead>
        <tbody>

        @foreach($medicalCases as $medicalCase)
            <tr>
                <td><p>{{ $medicalCase->id }}</p></td>
                <td><p>{{ $medicalCase->status }}</p></td>
                <td><p>{{ $medicalCase->createdDate }}</p></td>
            </tr>
        @endforeach      
          </tbody>
        </table>
    </body>
</html>
