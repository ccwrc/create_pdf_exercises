
<form action="pdf.php" method="POST">
    <br>
    <select name="departure">
        <option>
            Lotnisko wylotu: 
        </option>
        <?php
        for ($i = 0; $i < count($airports); $i++) {
            echo "<option value=\"" . $i . "\">" . $airports[$i]['name'] . "</option>";
        }
        ?>
    </select>
    <br/><br/>

    <select name="arrival">
        <option>
            Lotnisko przylotu:
        </option>
        <?php
        /*  'name'     => 'Chicago Rockford International Airport',
            'code'     => 'RFD',
            'timezone' => 'America/Chicago', */
        for ($i = 0; $i < count($airports); $i++) {
            echo "<option value=\"" . $i . "\">" . $airports[$i]['name'] . "</option>";
        }
        ?>
    </select>
    <br/><br/>

    <label> Czas wylotu: <br/>
        <input type="datetime-local" name="localDepartureTime" placeholder="DD-MM-YYYY  hh:mm:ss" size="40">
    </label>
    <br/><br/>

    <input type="number" name="length" placeholder="Długość lotu" min="0" step="1">
    <br/><br/>

    <input type="number" name="price" placeholder="Cena lotu" min="0" step="0.01">
    <br/><br/>

    <input type="submit" value="Zarezerwuj lot">
</form>
