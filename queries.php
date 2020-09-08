<!DOCTYPE html>

<?php	
	
	require "menu.php";

?>

<html>
<body>	

<div class="container">
<h1>Queries</h1>

<table class="table table-striped">
	<tr>
		<td>1. Αριθμός οχημάτων απο κάθε τύπο που υπάρχει σε κάθε κατάστημα</td>
		<td><a class="btn btn-default" href="queries/new_view=1.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>2. Πληροφορίες για τις συναλλαγές που έγιναν απο κατοίκους του εξωτερικού</td>
		<td><a class="btn btn-default" href="queries/new_view=2.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>3. Συνολικές εισπράξεις κάθε καταστήματος από την έναρξη λειτουργίας σε φθίνουσα σειρά</td>
		<td><a class="btn btn-default" href="queries/new_view=3.php">Επιλογή</a></td>
	</tr>
	
	<tr>
		<td>4. Υπάλληλοι που εργάζονται στην επιχείρηση με μισθό πάνω απο 1000€</td>
		<td><a class="btn btn-default" href="queries/new_view=4.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>5. Αυτοκίνητα που έχουν ενοικιαστεί το πολύ 3 φορές</td>
		<td><a class="btn btn-default" href="queries/new_view=5.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>6. Πελάτες που έχουν επιστρέψει τα αυτοκίνητα σε κακή κατάσταση (Blacklisted)</td>
		<td><a class="btn btn-default" href="queries/new_view=6.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>7. Πληρωμές πελατών για τις οποίες τα αυτοκίνητα δεν έχουν επιστραφεί ακόμα</td>
		<td><a class="btn btn-default" href="queries/new_view=7.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>8. Αυτοκίνητα που είναι ενοικιασμένα τώρα ή έχουν δεσμευτεί το προσεχές διάστημα</td>
		<td><a class="btn btn-default" href="queries/new_view=8.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>9. Οι πελάτες που έχουν νοικιάσει αυτοκίνητο από την εταιρεία τουλάχστον 2 φορές και δεν το επέστρεψαν ποτέ σε κακή κατάσταση</td>
		<td><a class="btn btn-default" href="queries/new_view=9.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>10. Ο μέσος όρος χιλιομέτρων ανά τύπο οχήματος</td>
		<td><a class="btn btn-default" href="queries/new_view=10.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>11. Το ετήσιο εισόδημα κάθε καταστήματος ανά έτος</td>
		<td><a class="btn btn-default" href="queries/new_view=11.php">Επιλογή</a></td>
	</tr>
	<tr>
		<td>12. Αυτοκίνητα τα οποία χρειάζονται ανανέωση Service ή Insurance μέσα στις επόμενες 30 μέρες</td>
		<td><a class="btn btn-default" href="queries/new_view=12.php">Επιλογή</a></td>
	</tr>
</table>

</div>

</body>
</html>