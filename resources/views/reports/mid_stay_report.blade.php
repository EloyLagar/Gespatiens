<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar PDF</title>
</head>
<body>
    <h2>Generar PDF</h2>
    <form action="/reports/mid-stay-report" method="post">
        @csrf
        <label for="texto">Texto:</label><br>
        <textarea id="texto" name="texto" rows="4" cols="50"></textarea><br>
        <label for="modo">¿Descargar automáticamente?</label>
        <select id="modo" name="modo">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select><br><br>
        <input type="submit" value="Generar PDF">
    </form>


</body>
</html>
