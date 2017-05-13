<?php
include "airports.php";
?>


<form action="pdf.php" method="POST">
    <br>
    <select name="departure">
        <option>
            Lotnisko wylotu: 
        </option>
        <?php
        for ($i = 0; $i < count($airports); $i++) {
            echo "<option>" . $airports[$i]['name'] . "</option>";
        }
        ?>
    </select>
    <br/><br/>

    <select name="arrival">
        <option>
            Lotnisko przylotu:
        </option>
        <?php
        for ($j = 0; $j < count($airports); $j++) {
            echo "<option>" . $airports[$j]['name'] . "</option>";
        }
        ?>
    </select>
    <br/><br/>

    <label> Czas odlotu: <br/>
        <input type="datetime-local" name="localDepartureTime" placeholder="DD-MM-YYYY  hh:mm:ss" size="40">
    </label>
    <br/><br/>

    <input type="number" name="length" placeholder="Długość lotu" min="0" step="1">
    <br/><br/>

    <input type="number" name="price" placeholder="Cena lotu" min="0" step="0.01">
    <br/><br/>

    <input type="submit" value="Zarezerwuj lot">
</form>
