<?php
declare(ENCODING = 'utf-8');
namespace PHPCR\Query;

/*                                                                        *
 * This file was ported from the Java JCR API to PHP by                   *
 * Karsten Dambekalns <karsten@typo3.org> for the FLOW3 project.          *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version. Alternatively, you may use the Simplified   *
 * BSD License.                                                           *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * A row in the query result table.
 *
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @license http://opensource.org/licenses/bsd-license.php Simplified BSD License
 * @api
 */
interface RowInterface {

    /**
     * Returns an array of all the values in the same order as the column names
     * returned by QueryResult.getColumnNames().
     *
     * @return array a Value array.
     * @throws \PHPCR\RepositoryException if an error occurs
     * @api
     */
    public function getValues();

    /**
     * Returns the value of the indicated column in this Row.
     *
     * @param string $columnName name of query result table column
     * @return mixed a value
     * @throws \PHPCR\ItemNotFoundException if columnName s not among the column names of the query result table.
     * @throws \PHPCR\RepositoryException if another error occurs.
     * @api
     */
    public function getValue($columnName);

    /**
     * Returns the Node corresponding to this Row and the specified selector,
     * if given.
     *
     * @param string $selectorName
     * @return \PHPCR\NodeInterface a Node
     * @throws \PHPCR\RepositoryException if selectorName is not the alias of a selector in this query or if another error occurs.
     * @api
     */
    public function getNode($selectorName = NULL);

    /**
     * Equivalent to Row.getNode(selectorName).getPath(). However, some
     * implementations may be able gain efficiency by not resolving the actual Node.
     *
     * @param string $selectorName
     * @return string
     * @throws \PHPCR\RepositoryException if selectorName is not the alias of a selector in this query or if another error occurs.
     * @api
     */
    public function getPath($selectorName = NULL);

    /**
     * Returns the full text search score for this row associated with the specified
     * selector. This corresponds to the score of a particular node.
     * If no selectorName is given, the default selector is used.
     * If no FullTextSearchScore AQM object is associated with the selector
     * selectorName this method will still return a value. However, in that case
     * the returned value may not be meaningful or may simply reflect the minimum
     * possible relevance level (for example, in some systems this might be a s
     * core of 0).
     *
     * Note, in JCR-SQL2 a FullTextSearchScore AQM object is represented by a
     * SCORE() function. In JCR-JQOM it is represented by a Java object of type
     * \PHPCR\Query\QOM\FullTextSearchScoreInterface.
     *
     * @param string $selectorName
     * @return float
     * @throws \PHPCR\RepositoryException if selectorName is not the alias of a selector in this query or (in case of no given selectorName) if this query has more than one selector (and therefore, this Row corresponds to more than one Node) or if another error occurs.
     * @api
     */
    public function getScore($selectorName = NULL);

}
