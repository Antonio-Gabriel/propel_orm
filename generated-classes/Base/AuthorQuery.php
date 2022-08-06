<?php

namespace Base;

use \Author as ChildAuthor;
use \AuthorQuery as ChildAuthorQuery;
use \Exception;
use \PDO;
use Map\AuthorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'author' table.
 *
 *
 *
 * @method     ChildAuthorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAuthorQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildAuthorQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 *
 * @method     ChildAuthorQuery groupById() Group by the id column
 * @method     ChildAuthorQuery groupByFirstName() Group by the first_name column
 * @method     ChildAuthorQuery groupByLastName() Group by the last_name column
 *
 * @method     ChildAuthorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAuthorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAuthorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAuthorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAuthorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAuthorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAuthorQuery leftJoinAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Author relation
 * @method     ChildAuthorQuery rightJoinAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Author relation
 * @method     ChildAuthorQuery innerJoinAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the Author relation
 *
 * @method     ChildAuthorQuery joinWithAuthor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Author relation
 *
 * @method     ChildAuthorQuery leftJoinWithAuthor() Adds a LEFT JOIN clause and with to the query using the Author relation
 * @method     ChildAuthorQuery rightJoinWithAuthor() Adds a RIGHT JOIN clause and with to the query using the Author relation
 * @method     ChildAuthorQuery innerJoinWithAuthor() Adds a INNER JOIN clause and with to the query using the Author relation
 *
 * @method     \BookQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAuthor|null findOne(?ConnectionInterface $con = null) Return the first ChildAuthor matching the query
 * @method     ChildAuthor findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildAuthor matching the query, or a new ChildAuthor object populated from the query conditions when no match is found
 *
 * @method     ChildAuthor|null findOneById(int $id) Return the first ChildAuthor filtered by the id column
 * @method     ChildAuthor|null findOneByFirstName(string $first_name) Return the first ChildAuthor filtered by the first_name column
 * @method     ChildAuthor|null findOneByLastName(string $last_name) Return the first ChildAuthor filtered by the last_name column *

 * @method     ChildAuthor requirePk($key, ?ConnectionInterface $con = null) Return the ChildAuthor by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAuthor requireOne(?ConnectionInterface $con = null) Return the first ChildAuthor matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAuthor requireOneById(int $id) Return the first ChildAuthor filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAuthor requireOneByFirstName(string $first_name) Return the first ChildAuthor filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAuthor requireOneByLastName(string $last_name) Return the first ChildAuthor filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAuthor[]|Collection find(?ConnectionInterface $con = null) Return ChildAuthor objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildAuthor> find(?ConnectionInterface $con = null) Return ChildAuthor objects based on current ModelCriteria
 * @method     ChildAuthor[]|Collection findById(int $id) Return ChildAuthor objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildAuthor> findById(int $id) Return ChildAuthor objects filtered by the id column
 * @method     ChildAuthor[]|Collection findByFirstName(string $first_name) Return ChildAuthor objects filtered by the first_name column
 * @psalm-method Collection&\Traversable<ChildAuthor> findByFirstName(string $first_name) Return ChildAuthor objects filtered by the first_name column
 * @method     ChildAuthor[]|Collection findByLastName(string $last_name) Return ChildAuthor objects filtered by the last_name column
 * @psalm-method Collection&\Traversable<ChildAuthor> findByLastName(string $last_name) Return ChildAuthor objects filtered by the last_name column
 * @method     ChildAuthor[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildAuthor> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AuthorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AuthorQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'bookstore', $modelName = '\\Author', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAuthorQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAuthorQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildAuthorQuery) {
            return $criteria;
        }
        $query = new ChildAuthorQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAuthor|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AuthorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AuthorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAuthor A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, first_name, last_name FROM author WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAuthor $obj */
            $obj = new ChildAuthor();
            $obj->hydrate($row);
            AuthorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildAuthor|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(AuthorTableMap::COL_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(AuthorTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AuthorTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AuthorTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AuthorTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE first_name LIKE '%fooValue%'
     * $query->filterByFirstName(['foo', 'bar']); // WHERE first_name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $firstName The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AuthorTableMap::COL_FIRST_NAME, $firstName, $comparison);

        return $this;
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE last_name LIKE '%fooValue%'
     * $query->filterByLastName(['foo', 'bar']); // WHERE last_name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lastName The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AuthorTableMap::COL_LAST_NAME, $lastName, $comparison);

        return $this;
    }

    /**
     * Filter the query by a related \Book object
     *
     * @param \Book|ObjectCollection $book the related object to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAuthor($book, ?string $comparison = null)
    {
        if ($book instanceof \Book) {
            $this
                ->addUsingAlias(AuthorTableMap::COL_ID, $book->getAuthorId(), $comparison);

            return $this;
        } elseif ($book instanceof ObjectCollection) {
            $this
                ->useAuthorQuery()
                ->filterByPrimaryKeys($book->getPrimaryKeys())
                ->endUse();

            return $this;
        } else {
            throw new PropelException('filterByAuthor() only accepts arguments of type \Book or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Author relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinAuthor(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Author');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Author');
        }

        return $this;
    }

    /**
     * Use the Author relation Book object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \BookQuery A secondary query class using the current class as primary query
     */
    public function useAuthorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAuthor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Author', '\BookQuery');
    }

    /**
     * Use the Author relation Book object
     *
     * @param callable(\BookQuery):\BookQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withAuthorQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useAuthorQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the Author relation to the Book table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \BookQuery The inner query object of the EXISTS statement
     */
    public function useAuthorExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Author', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the Author relation to the Book table for a NOT EXISTS query.
     *
     * @see useAuthorExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \BookQuery The inner query object of the NOT EXISTS statement
     */
    public function useAuthorNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Author', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param ChildAuthor $author Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($author = null)
    {
        if ($author) {
            $this->addUsingAlias(AuthorTableMap::COL_ID, $author->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the author table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AuthorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AuthorTableMap::clearInstancePool();
            AuthorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AuthorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AuthorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AuthorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AuthorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
