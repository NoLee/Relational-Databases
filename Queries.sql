-select sum(`Salary`) from `Employee`
	Εμφανίζει συνολικά πόσους μισθούς πληρώνει η εταιρία για υπαλλήλους.
	
-select c.Name, c.Surname, e.Street, e.`Street Num`, e.`Postal Code`, g.Starts, g.Duration, g.Rent, g.`Payment Method`
from `contract` as g
inner join `customer` as c
on c.Customer_ID=g.Customer_ID
inner join `estate` as e
on g.Estate_ID=e.Estate_ID
	Μας δείχνει για όλους τους πελάτες που έχουν συμβόλαιο με ποιό ακίνητο το έχουν αυτό το συμβόλαιο και τα στοιχεία του συμβολαίου τους.

-select em.Name, em.Surname, es.Street as EstateStreet, es.`Street Num` as EstateStreetNum, es.`Postal Code`
from `employee`as em 
inner join `estate` as es
on em.Employee_ID=es.Employee_ID
	Μας δείχνει για όλους τους υπαλλήλους, για ποιά ακίνητα είναι υπεύθυνος ο καθένας.
	
-SELECT e.Name , e.Surname , .e.Salary
FROM `employee` as e
WHERE e.Salary > 2000 
ORDER BY Salary ASC
	Διαλέγει τους υπαλλήλους που έχουν μισθό μεγαλύτερο απο όσο δείνει ο χρήστης και τους εμφανίζει με αύξουσα σειρά.
	
-select p.Name,p.Surname,count(e.Owner_ID) as NumberOfEstates
from `owner` as o
right join `private` as p
on p.Owner_ID=o.Owner_ID
left join `estate`as e
on e.Owner_ID=o.Owner_ID
group by p.Name,p.Surname
	Βρίσκει πόσα ακίνητα έχει διαθέσει κάθε ιδιώτης στην εταιρία μας.
	
-select c.`Company Name`,count(e.Owner_ID) as NumberOfEstates
from `owner` as o
right join `company` as c
on c.Owner_ID=o.Owner_ID
left join `estate`as e
on e.Owner_ID=o.Owner_ID
group by c.`Company Name`
	Βρίσκει πόσα ακίνητα έχει διαθέσει κάθε επιχείρηση στην εταιρία μας.
	
-select e.Name, e.Surname, count(s.Customer_ID) as NumberOfCustomers
from `serves` as s 
right join `employee` as e
on e.Employee_ID=s.Employee_ID
group by  e.Name, e.Surname
having NumberOfCustomers >= 0
	Βρίσκει τους υπαλλήλους που εξυπηρετούν παραπάνω πελάτες απο έναν αριθμό που δίνει ο χρήστης.

-SELECT E.Street, E.`Street Num `
 FROM   `estate` as E 
 WHERE E.Estate_ID NOT IN ( SELECT `Estate_ID` FROM `contract` )
	Βρίσκει τα ακίνητα που δεν έχουν συμβόλαιο.

-select e.Street,e.`Street Num`,count(v.`Visit Date`) as NumberOfVisits
from `estate` as e
left join `visit` as v
on v.Estate_ID=e.Estate_ID
group by  e.Street,e.`Street Num`
	Πόσες επισκέψεις έχει κάθε ακίνητο.

-select e.`Monthly Rent`, e.Street, e.`Street Num`, e.`Postal Code`,e.`Estate Type`, e.`Room Num`, e.`Square Meters` 
from `estate`as e
where e.`Monthly Rent`=(select min(`Monthly Rent`) from `estate`)
	Βρίσκει τις πληροφορίες του σπιτιού με το ελαχιστο ενοίκιο.
	
-select c.Name,c.Surname,c.`Home Type` ,c.`Maximum Rent`,e.Street,e.`Street Num`, e.`Postal Code`,e.`Estate Type`,e.`Monthly Rent`
from `customer` as c
inner join `estate` as e
on e.`Monthly rent`< c.`Maximum Rent`
where c.`Name` like 'X' and c.`Surname` like 'Y' 
Βρίσκει για τον πελάτη που δίνει ο χρήστης (όνομα Χ και επίθετο Υ) τα ακίνητα τα οποία μπορεί να νοικιάσει σύμφωνα με το μέγιστο ενοίκιο που έχει πει ότι μπορεί να διαθέσει.

	
