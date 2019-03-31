<?php 
include 'DB_Config.php';
class ratings {
public function ratingTitles () {
include 'DB_Config.php';
$query = $connection->prepare("SELECT * FROM ratingtitles");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$output = '';
foreach($result as $row)
{
$rating = count_rating($row["ratingTitleId"], $connection);
$color = '';
$output .= 
'<h4 style="color:#005DA6">'.$row['Title'].'</h4>
<ul class="list-inline" data-rating="'.$rating.'" 
title="Average rating - '.$rating.'" >
';
for($count=1; $count <=5; $count++)
{
if ($count <= $rating)
{
$color = 'color:#ffcc00;';
}
else
{
$color = 'color:#ccc;';
}
$output .= '<li title="'.$count.'" ratingTitleId="'.$row['ratingTitleId'].'-'.
$count.'" data-index="'.$count.'" data-ratingTitleId="
'.$row['ratingTitleId'].'" data-rating="'.$rating.'" 
class="rating" style="cursor:pointer; '.$color.' 
font-size:20px;">&#9733;</li>';
}
$output .= '
</ul>
';
}
return $output;
}
function count_rating($ratingTitleId, $connection){
include 'DB_Config.php';
$output = 0;
$query = $connection->prepare("SELECT AVG(rating) as rating FROM ratings WHERE ratingTitleId = '".$ratingTitleId."' AND courseTag = 'CN'
");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_row = $query->rowCount();
if($total_row > 0)
{
foreach($result as $row)
{
$output = round($row["rating"]);
}
}
return $output;
}
}
?>
