<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS ACADEMIC PERFORMANCE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .left {
            flex: 1;
        }

        .right {
            flex: 1;
            text-align: right;
        }

        .title {
            text-align: center;
            margin-top: 20px;
        }

        .checklist {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .checklist input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <p>Home</p>
            <p>Students Academic Performance</p>
            <div class="title">STUDENTS ACADEMIC PERFORMANCE</div>
            <div>BSILT 2C Integrative Programming and Technologies (ITP 109)</div>
            <div>
                <p>1. 22B0510 - Loto, Mark Heindrich B.</p>
                <div class="checklist">
                    <input type="checkbox" id="tardiness1" name="tardiness1">
                    <label for="tardiness1">Tardiness</label>
                    <input type="checkbox" id="excuses1" name="excuses1">
                    <label for="excuses1">Excuses</label>
                    <input type="checkbox" id="absences1" name="absences1">
                    <label for="absences1">Absences</label>
                    <input type="date" id="dateabsent1" name="dateabsent1">
                    <label for="dateabsent1">Date Absent</label>
                    <button>Reach Out Parent/Guardian</button>
                </div>
            </div>
            <div>
                <p>2. 2070712 - Sadiwa, Jessieca L.</p>
                <div class="checklist">
                    <input type="checkbox" id="tardiness2" name="tardiness2">
                    <label for="tardiness2">Tardiness</label>
                    <input type="checkbox" id="excuses2" name="excuses2">
                    <label for="excuses2">Excuses</label>
                    <input type="checkbox" id="absences2" name="absences2">
                    <label for="absences2">Absences</label>
                    <input type="date" id="dateabsent2" name="dateabsent2">
                    <label for="dateabsent2">Date Absent</label>
                    <button>Reach Out Parent/Guardian</button>
                </div>
            </div>
        </div>
        <div class="right">
            <p>PASCUAL, WILMER M.</p>
        </div>
    </div>
</body>

</html>