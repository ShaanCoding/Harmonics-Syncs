<?php

/**
 * Adds a swipe into the database
 * 
 * m: 3
 * userid: user id
 * targetid: target id
 * swiped: swiped yes or not
 * 
 * will automatically check if this swipe combination already exists and is active
 * if not then we will add it to our list
 * 
 * after we add it to our list, we want to check if we receive a match, if so we respond with a notification?
 * 
 */

require_once("../include/swipes.php");
require_once("../include/matches.php");

$swipes_db = new Swipes;
$matches_db = new Matches;

$userid = ValidGet('userid');
$targetid = ValidGet('targetid');
$swiped = ValidGet('swiped');

if (!ValidInput($userid)) {
    die("Bad uid");
}

if (!ValidInput($targetid)) {
    die("Bad tid");
}

$existing_swipe = $swipes_db->GetSwipeFromUseridAndTarget($userid, $targetid);

if (ValidInput($existing_swipe)) {
    die("exists"); // This card has already been swiped!
}

// check if there has been a match
$swipe_match = $swipes_db->GetSwipeFromUseridAndTarget($targetid, $userid);

$has_match = false;

if (ValidInput($swipe_match)) {
    if ($swipe_match['swiped']) { // matched!
        if (!$matches_db->DoesMatchExist($userid, $targetid)) { // shouldnt happen anyways?
            $matches_db->AddMatch($userid, $targetid);
            $has_match = true;
        }
    }
}

$swipes_db->AddSwipe($userid, $targetid, $swiped);

$has_match ? die("match") : die("success");
